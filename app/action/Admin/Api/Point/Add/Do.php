<?php
/**
 * Back.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理APIポイント追加実行処理アクションフォームクラス
 *
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminPointBack extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'code' => array(
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
	);
}

/**
 * 管理APIポイント追加実行処理アクション実行クラス
 *
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminPointAddDo extends Tv_ActionAdmin
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->validate() > 0) return false;
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// ポイントバックアクセスログ
		$buf = "";
		$buf.= "REQUEST_URI		: {$_SERVER['REQUEST_URI']}\n";
		$buf.= "REMOTE_ADDR		: {$_SERVER['REMOTE_ADDR']}\n";
		$buf.= "HTTP_USER_AGENT	: {$_SERVER['HTTP_USER_AGENT']}\n";
		
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','pointback_log');
		$o->set('log_body',$buf);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		$um = $this->backend->getManager('Util');
		$pm = $this->backend->getManager('Point');
		
		//外部アプリからのパラメータ「uaid(user_ad_id)」を元に情報取得
		$ac = new Tv_AdCode($this->backend, array('ad_code_param', 'ad_code_status'), array($this->af->get('code'), 1));
		// uaidが取得できない場合は終了
		if(!array_key_exists($ac->get('ad_code_uaid_param'), $_REQUEST)) exit();
		// ステータスの設定がある場合
		if($ac->get('ad_code_status_param') != ""){
			// ステータスが取得できない場合は終了
			 if(!array_key_exists($ac->get('ad_code_status_param'), $_REQUEST)) exit();
			$status = $_REQUEST[$ac->get('ad_code_status_param')];
			// 取得したステータスが受信するステータスと異なる場合は終了
			 if($status != $ac->get('ad_code_status_param_receive')) exit();
		}
		// 設定がない場合はすべて受信する
		// 単価設定がある場合
		if($ac->get('ad_code_price_param')){
			 $price = $_REQUEST[$ac->get('ad_code_price_param')];
		}
		
		// uaidを取得
		$uaid = $_REQUEST[$ac->get('ad_code_uaid_param')];
		$o =& new Tv_UserAd($this->backend,'user_ad_id',$uaid);
		$user_id = $o->get('user_id');
		$ad_id = $o->get('ad_id');
		$user_ad_status = $o->get('user_ad_status');
		
		// user_ad_statusが未承認（1）でない場合は終了
		if($user_ad_status != 1) exit();
		
		//ad_idから付与するポイントを取得する
		$o =& new Tv_Ad($this->backend,'ad_id',$ad_id);
		$ad_type = $o->get('ad_type');
		$ad_name = $o->get('ad_name');
// 更新のため、想定外のポイントタイプの場合は、広告情報が書き換えられてしまった可能性が高いため、処理を継続する
//		if($ad_type == 1) exit();//ad.ad_type 1:ワンクリック 2:登録 3:料率
		$point_type_search = $this->config->get('point_type_search');
		// 増分のポイント計算
		if($o->get('ad_point_type') == 1){
			// 固定ポイント制の場合
			$ad_point = $o->get('ad_point');
			$point_type = $point_type_search['ad_regist'];
		}else{
			// 定量制の場合
			$ad_point = floor($price * $o->get('ad_point_percent')/100 * $this->config->get('point_price_rates'));// ポイント<=>円レート
			$point_type = $point_type_search['ad_buy'];
		}
		
		/* =============================================
		// 広告ログ更新
		 ============================================= */
		$o =& new Tv_UserAd($this->backend, 'user_ad_id', $uaid);
		$o->set('user_ad_status', 2);
		$o->set('user_ad_updated_time', date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)){
			// メール送信
			exit();
		};
		
		/* =============================================
		// 広告配信終了数設定がされていれば、-1
		 ============================================= */
		$a = new Tv_Ad($this->backend, 'ad_id', $ad_id);
		if($a->get('ad_stock_status')){
			$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
			$r = $a->update();
			// エラー制御は行わない
		}
		
		/* =============================================
		// ポイント追加系処理
		 ============================================= */
		$param = array(
			'user_id'		=> $user_id,
			'point'			=> $ad_point,
			'point_type'	=> $point_type,
			'point_status'	=> 2,// 承認済み
			'user_sub_id'	=> $uaid,
			'point_sub_id'	=> $ad_id,
			'point_memo'	=> $ad_name,
		);
		$pm->addPoint($param);
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// 登録履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 3);
		
		// 成果を承認
		print "OK";
		exit();
	}
}
?>