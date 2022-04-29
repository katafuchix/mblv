<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達申請実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendApplyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
		'friend_message' => array(
		),
		'confirm' => array(
		),
		'submit' => array(
		),
		'back' => array(
		),
		
	);
}

/**
 * ユーザ友達申請実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendApplyDo extends Tv_ActionUserOnly
{
	/*
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			return 'user_friend_apply';
		}
		
		//既に友達リンク申請済みのばあい戻す
		$user = $this->session->get('user');
		$from_user_id = $user['user_id'];
		//既に友達リンク申請済みのばあい戻す
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' friend_id ',
			'sql_from'		=> ' friend ',
			'sql_where'		=> 'from_user_id = ? AND to_user_id  = ? ',
			'sql_values'	=> array( $from_user_id, $this->af->get('to_user_id') ),
		);
		$user = $um->dataQuery($param);
		
		//if($user[0] > 0){
		if(count($user) > 0){
			$this->ae->add(null, '', E_USER_FRIEND_APPLY_DUPLICATE);
			return 'user_error';
		}
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
		//友達申請
		$fm = $this->backend->getManager('Friend');
		$fm->applyFriend();
		
		return 'user_friend_apply_done';
	}
}
?>