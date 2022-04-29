<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザサウンド購入実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserSoundBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'sound_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'ｻｳﾝﾄﾞID',
		),
	);
}

/**
 * ユーザサウンド購入実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserSoundBuyDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_sound_buy';
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
		
		$sound_id = $this->af->get('sound_id');
		$us =& new Tv_UserSound($this->backend);
		// 重複サウンド購入確認
		$us_list =& $us->searchProp(
			array('sound_id'),
			array(
				'user_id'			=> $user['user_id'],
				'sound_id'			=> $sound_id,
				'user_sound_status'		=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
			)
		);
		// 購入履歴に該当がなければ購入
		if($us_list[0] == 0){
			/* =============================================
			// ポイントチェック
			 ============================================= */
			$s =& new Tv_Sound($this->backend, 'sound_id', $sound_id);
			$sound_category_id = $s->get('sound_category_id');
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $s->get('sound_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_sound_buy';
			}
			
			/* =============================================
			// サウンド購入
			 ============================================= */
			$us = new Tv_UserSound($this->backend);
			$us->set('user_id', $user['user_id']);
			$us->set('sound_id', $sound_id);
			$us->set('user_sound_status', 1);
			$us->set('user_sound_created_time', $timestamp);
			$us->set('user_sound_updated_time', $timestamp);
			$r = $us->add();
			if(Ethna::isError($r)) return 'user_sound_buy';
			// ユーザサウンドID
			$usid = $us->getId();
			
			/* =============================================
			// サウンド配信終了数設定がされていれば、-1
			 ============================================= */
			$s = new Tv_Sound($this->backend, 'sound_id', $sound_id);
			if($s->get('sound_stock_status')){
				$s->set('sound_stock_num', $s->get('sound_stock_num') -1 );
				$r = $s->update();
				if(Ethna::isError($r)) return 'user_sound_buy';
			}
			
			/* =============================================
			// ポイント追加系処理
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $s->get('sound_point'),
				'point_type'	=> $point_type_search['sound'],
				'point_status'	=> 2,// 承認済み
				'user_sub_id'	=> $usid,
				'point_sub_id'	=> $sound_id,
				'point_memo'	=> $s->get('sound_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ログ追加処理
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('sound',$sound_id, $sound_category_id);
		}
		
		// AU/DOCOMOの場合ダウンロードページを表示
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU' || $GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
			$this->ae->add(null, '', I_USER_SOUND_BUY_DONE);
			return 'user_sound_dl';
		}else{
			// ダウンロード開始
//			$user_url = $this->config->get('user_url');
//			$SESSID = $_REQUEST['SESSID'];
			$id = $this->af->get('sound_id');
			
			//アクション名の指定
			$action_name = 'user_file_get';
			$c =& $this->backend->getController();
			$form_name = $c->getActionFormName($action_name);
			$backend =& new Ethna_Backend($c);
			$backend->action_form =& new $form_name($c);
			$backend->af =& $backend->action_form;
			$backend->af->setFormVars();
			$backend->af->set('type', 'sound');
			$backend->af->set('id', $id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=sound&id={$id}&SESSID={$SESSID}");
		}
	}
}

?>
