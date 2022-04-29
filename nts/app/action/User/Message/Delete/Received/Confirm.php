<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
require_once 'action/User/Message/Delete/Received/Do.php';

/**
 * ユーザ受信メッセージ削除確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */

class Tv_Form_UserMessageDeleteReceivedConfirm extends Tv_Form_UserMessageDeleteReceivedDo
{
}

/**
 * ユーザ受信メッセージ削除確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserMessageDeleteReceivedConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$message =& new Tv_Message(
			$this->backend,
			'message_id',
			$this->af->get('message_id')
		);
		
		if( !$message->isValid() ) {
			$this->ae->add(null, '', E_USER_MESSAGE_NOT_FOUND);
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
		return 'user_message_delete_received_confirm';
	}
}

?>
