<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
require_once 'action/User/Message/Delete/Received/Do.php';

/**
 * �桼��������å����������ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */

class Tv_Form_UserMessageDeleteReceivedConfirm extends Tv_Form_UserMessageDeleteReceivedDo
{
}

/**
 * �桼��������å����������ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserMessageDeleteReceivedConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
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
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_message_delete_received_confirm';
	}
}

?>
