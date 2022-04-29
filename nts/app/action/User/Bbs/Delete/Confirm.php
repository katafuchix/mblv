<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ伝言削除確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'action/User/Bbs/Delete/Do.php';
class Tv_Form_UserBbsDeleteConfirm extends Tv_Form_UserBbsDeleteDo
{
}

/**
 * ユーザ伝言削除確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBbsDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		
		// 削除するのは自分が書き込んだものか？
		$userSession = $this->session->get('user');
		// 書き込んだ人  $message->get('from_user_id')
		// 書き込まれた人 $message->get('to_user_id')
		if($userSession['user_id'] != $message->get('from_user_id') && $userSession['user_id'] != $message->get('to_user_id')){
			$this->ae->add(null, '', E_USER_BBS_MESSAGE_NOT_FOUND);
			return 'user_error';
		}
		
		if( !$message->isValid() ) {
			$this->ae->add(null, '', E_USER_BBS_MESSAGE_NOT_FOUND);
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
		return 'user_bbs_delete_confirm';
	}
}
?>