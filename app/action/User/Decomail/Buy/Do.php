<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザデコメール購入実行アクションフォーム
 * 	
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserDecomailBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'decomail_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}

/**
 * ユーザデコメール購入実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserDecomailBuyDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_decomail_buy';
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
		// タイムスタンプ生成
		$timestamp = date('Y-m-d H:i:s');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		$decomail_id = $this->af->get('decomail_id');
		// デコメール情報取得
		$d =& new Tv_Decomail($this->backend, 'decomail_id', $decomail_id);
		
		/* =============================================
		// 配信終了日時確認
		// 配信終了日時を超えているの場合
		 ============================================= */
		if ( $d->get('decomail_end_status') == 1 ) {
			if ( $d->get('decomail_end_time') <= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_DECOMAIL_OUT_OF_DATE);
				return 'user_error';
			}
		}
		
		$decomail_file_a = $d->get('decomail_file_a');
		
		// 重複デコメール購入確認
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' decomail_id ',
			'sql_from'		=> ' user_decomail ',
			'sql_where'		=> 'user_id = ? AND decomail_id  = ? AND user_decomail_status <> ?',
			'sql_values'	=> array( $user['user_id'], $decomail_id, 0 ),
		);
		$ud_list = $um->dataQuery($param);
		
		// 購入履歴に該当がなければ購入
		//if($ud_list[0] == 0){
		if(count($ud_list) == 0){
			/* =============================================
			// ポイントチェック
			 ============================================= */
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $d->get('decomail_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_decomail_buy';
			}
			
			/* =============================================
			// デコメール購入
			 ============================================= */
			$ud = new Tv_UserDecomail($this->backend);
			$ud->set('user_id', $user['user_id']);
			$ud->set('decomail_id', $decomail_id);
			$ud->set('user_decomail_status', 1);
			$ud->set('user_decomail_created_time', $timestamp);
			$ud->set('user_decomail_updated_time', $timestamp);
			$r = $ud->add();
			if(Ethna::isError($r)) return 'user_decomail_buy';
			// ユーザデコメールID
			$udid = $ud->getId();
			
			/* =============================================
			// デコメール配信終了数設定がされていれば、-1
			 ============================================= */
			$d = new Tv_Decomail($this->backend, 'decomail_id', $decomail_id);
			$decomail_category_id = $d->get('decomail_category_id');
			if($d->get('decomail_stock_status')){
				$d->set('decomail_stock_num', $d->get('decomail_stock_num') -1 );
				$r = $d->update();
				if(Ethna::isError($r)) return 'user_decomail_buy';
			}
			
			/* =============================================
			// ポイント追加系処理
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $d->get('decomail_point'),
				'point_type'	=> $point_type_search['decomail'],
				'point_status'	=> 2,// 承認済み
				'user_sub_id'	=> $udid,
				'point_sub_id'	=> $decomail_id,
				'point_memo'	=> $d->get('decomail_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ログ追加処理
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('decomail',$decomail_id, $decomail_category_id);
		}
		
		// AUの場合
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
			// ダウンロードページを表示
			if(preg_match('/.*khm.*/i', $decomail_file_a, $match)){
				$this->ae->add(null, '', I_USER_DECOMAIL_BUY_DONE);
				return 'user_decomail_dl';
			}
			// コンテンツデータへ遷移
			else{
				$file_url = $this->config->get('file_url');
				header("Location: {$file_url}decomail/{$decomail_file_a}");
			}
		}else{
			// ダウンロード開始
//			$user_url = $this->config->get('user_url');
//			$SESSID = $_REQUEST['SESSID'];
			//アクション名の指定
			$action_name = 'user_file_get';
			$c =& $this->backend->getController();
			$form_name = $c->getActionFormName($action_name);
			$backend =& new Ethna_Backend($c);
			$backend->action_form =& new $form_name($c);
			$backend->af =& $backend->action_form;
			$backend->af->setFormVars();
			$backend->af->set('type', 'decomail');
			$backend->af->set('id', $decomail_id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=decomail&id={$decomail_id}&SESSID={$SESSID}");
		}
	}
}
?>