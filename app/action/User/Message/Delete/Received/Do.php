<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������å���������¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserMessageDeleteReceivedDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'message_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'submit' => array(
		),
	);
}

/**
 * �桼��������å���������¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageDeleteReceivedDo extends Tv_ActionUserOnly
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
		
		if($this->af->get('back') != '' || $this->af->validate() > 0)
			return 'user_message_view_received';
		
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
		$message =& new Tv_Message(
			$this->backend,
			'message_id',
			$this->af->get('message_id')
		);
		
		if($message->get('message_status_from') == 3){
			/* ���п͡��������������������Ȥ�ʪ����� */
			$message->remove();
		}else{
			$message->set('message_status_to', 3);
			$message->update();
		};
		
		$this->ae->add(null, $this->af->getFtName('message') , I_USER_MESSAGE_DELETE_DONE);
		return 'user_message_list_received';
	}
}
?>