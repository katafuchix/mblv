<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザメッセージ送信確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserMessageSendConfirm extends Tv_Form_UserMessageSendDo
{
}
/**
 * ユーザメッセージ送信確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageSendConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back'))
		{
			if($this->af->get('reply_message_id'))
			{
				$this->af->set('message_id', $this->af->get('reply_message_id'));
				return 'user_message_view_received';
			}
			elseif($this->af->get('to_user_id'))
			{
				$this->af->set('user_id', $this->af->get('to_user_id'));
				return 'user_profile_view';
			}
			else
			{
				return 'user_home';
			}
		}
		
		if($this->af->validate() > 0)
			return 'user_message_send';
			
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
		// HIDDENフォーム生成
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'send', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// 送信先ユーザ情報取得
		$toUser = new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
		
		return 'user_message_send_confirm';
	}
}
?>