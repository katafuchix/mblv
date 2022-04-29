<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����å�����������ǧ���������ե�����
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
 * �桼����å�����������ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageSendConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
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
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// HIDDEN�ե���������
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'send', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// ������桼���������
		$toUser = new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
		
		return 'user_message_send_confirm';
	}
}
?>