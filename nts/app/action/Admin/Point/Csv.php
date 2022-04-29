<?php
/**
 * Csv.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理ポイント承認CSVアップロードアクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminPointCsv extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'csv' => array(
			'name'		=> 'CSVファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
	);
}

/**
 * 管理ポイント承認CSVアップロード一覧アクション実行クラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminPointCsv extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		// ファイルのアップロードがあった場合
		if($this->af->get('csv')){
			$csv = $this->af->get('csv');
			$line = file($csv['tmp_name']);
			if(!is_array($line)){
				$this->ae->add('errors', "指定されたファイルにはレコードがありません");
				return 'admin_point_csv';
			}
			foreach($line as $v){
				if(!$v) continue;
				$param = explode(",", $v);
				$uaid = $param[0];
				$price = $param[1];
				
				// ユーザ広告を取得する
				$o =& new Tv_UserAd($this->backend,'user_ad_id',$uaid);
				$user_id = $o->get('user_id');
				$ad_id = $o->get('ad_id');
				$user_ad_status = $o->get('user_ad_status');
				$user_ad_regist_time = $o->get('user_ad_regist_time');
				$user_ad_update_time = $o->get('user_ad_update_time');
				
				// user_ad_statusが未承認（1）でない場合は次へ
				if($user_ad_status != 1){
					$this->ae->add('errors', $uaid . "は既に承認済みかその他のステータスのため承認できません");
					continue;
				}
				
				//ad_idから付与するポイントを取得する
				$o =& new Tv_Ad($this->backend,'ad_id',$ad_id);
				$ad_type = $o->get('ad_type');
				//ad.ad_type 1:ワンクリック 2:登録
				if($ad_type == 1){
					$this->ae->add('errors', $uaid . "はワンクリックタイプの広告のため承認できません");
					continue;
				}
				// 増分のポイント計算
				if($o->get('ad_point_type') == 1){
					// 固定ポイント制の場合
					$ad_point = $o->get('ad_point');
				}else{
					// 定量制の場合
					$ad_point = $price * $o->get('ad_point_percent')/100 * 10;// ポイント<=>円レート
				}
				
				//ユーザの現在所有ポイントを取得
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				$user_point = $o->get('user_point');
				
				//今回付与するポイントと現在のポイントの合計（残高 point_balance
				$point_balance = intval(($ad_point) + ($user_point));
				
				//point（ポイント履歴）を更新
				$o =& new Tv_Point($this->backend, 'user_ad_id', $uaid);
				$o->set('point_status', 2);//承認済み。決めうち
				$o->set('point', $ad_point);
				$o->set('point_balance', $point_balance);
				$o->set('point_created_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				// 登録エラーの場合
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "の承認に失敗しました");
					continue;
					// メール送信
//					exit();
				};

/*				//point（ポイント履歴）に登録
				$o =& new Tv_Point($this->backend);
				$o->set('user_id', $user_id);
				$o->set('point', $ad_point);
				$o->set('point_type', 7);//登録広告。決めうち
				$o->set('point_sub_id', $ad_id);
				$o->set('point_status', 2);//承認済み。決めうち
				$o->set('point_balance', $point_balance);
				$o->set('point_regist_time', date('Y-m-d H:i:s'));
				$r = $o->add();
				// 登録エラーの場合
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "の承認に失敗しました");
					continue;
					// メール送信
//					exit();
				};
*/				
				//user_adを更新
				$o =& new Tv_UserAd($this->backend, 'user_ad_id', $uaid);
				$o->set('user_ad_status', 2);
				$o->set('user_ad_update_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "の承認に失敗しました");
					continue;
					// メール送信
//					exit();
				};
				
				//user.user_pointを更新
				$o =& new Tv_User($this->backend, 'user_id', $user_id);
				$o->set('user_point', $point_balance);
				$r = $o->update();
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "の承認に失敗しました");
					continue;
					// メール送信
//					exit();
				};
				
				/* =============================================
				// 広告統計解析処理
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// 登録履歴をINSERT
				$sm->addStats('ad', $ad_id, 0, 3);
				
				$this->ae->add('errors', $uaid . "を承認しました。");
			}
		}
		return 'admin_point_csv';
	}
}
?>