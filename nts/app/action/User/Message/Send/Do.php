<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼����å����������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserMessageSendDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'reply_message_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'message_title' => array(
			'required'  => true,
		),
		'message_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'send' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼����å����������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserMessageSendDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'user_message_send';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_message_send';
		
		// ������
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_message_send';
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
		// ��å������ɲ�
		$message =& new Tv_Message($this->backend);
		$message->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$message->add();
		
		// ��å������ϥå���򥻥å�
		$this->af->setApp('message_hash', $message->get('message_hash'));
		
		// �ֿ����ä������ֿ����Υ�å��������ֿ��Ѥߤˤ���
		if($this->af->get('reply_message_id') != ''){
			$message = new Tv_Message(
				$this->backend,
				'message_id',
				$this->af->get('reply_message_id')
			);
			$message->set('message_status_to', 4);	// �ֿ��Ѥ�
			$message->update();
		}
		
		return 'user_message_send_done';
	}
}

?>
