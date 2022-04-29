<?php
/**
 * Sent.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 送信済みメール表示画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserMessageViewSent extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// メッセージを取得
		$message =& new Tv_Message($this->backend,'message_id',$this->af->get('message_id'));
		if(!$message->isValid() || $message->get('message_status') == 0) {
			$this->ae->add(null, '', E_USER_MESSAGE_NOT_FOUND);
			return ;
		}
		$this->af->setApp('message', $message->getNameObject());
		
		// 宛先のニックネームを取得
		$userTo =& new Tv_User($this->backend,'user_id',$message->get('to_user_id'));
		$this->af->setApp('to_user', $userTo->getNameObject());
	}
}
?>