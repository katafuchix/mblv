<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserReportSendDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'report_fail_user_id' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'report_message' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_TEXTAREA,
			'string_max_emoji'  => 2000,
		),
		'confirm' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'send' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'back' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserReportSendDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// back or ���ڥ��顼�ξ��
		if($this->af->get('back') != '' || $this->af->validate() > 0) return 'user_report_send';
		
		// 2��POST�ξ��
		if(Ethna_Util::isDuplicatePost()) return 'user_report_send_done';
		
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
		// ���å���󤫤�桼����������
		$user = $this->session->get('user');
		// report����Ͽ
		$o =& new Tv_Report($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('report_user_id', $user['user_id']);
		$o->set('report_status', 1);
		$o->set('report_regist_time', date('Y-m-d H:i:s'));
		$o->set('report_update_time', date('Y-m-d H:i:s'));
		$o->add();
		
		return 'user_report_send_done';
	}
}
?>