<?php
/**
 * Received.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������å�����ɽ�����̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserMessageViewReceived extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ��å���������
		$message = &new Tv_Message($this->backend,'message_id',$this->af->get('message_id'));
		if(!$message->isValid() || $message->get('message_status') == 0){
			$this->ae->add(null, '', E_USER_MESSAGE_NOT_FOUND);
			return ;
		}
		// ̤�ɤʤ�д��ɤˤ���
		if($message->get('message_status_to') == 1){
			$message->set('message_status_to', 2);
			$message->update();
		}
		$this->af->setApp('message', $message->getNameObject());
		
		// ���пͤΥ˥å��͡�������
		$userFrom = &new Tv_User($this->backend,'user_id',$message->get('from_user_id'));
		$this->af->setApp('from_user', $userFrom->getNameObject());
	}
}
?>