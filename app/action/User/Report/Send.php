<?php
/**
 * Send.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserReportSend extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'report_fail_user_id' => array(
			'name'		=> '�����оݼ�',
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�������������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserReportSend extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		return 'user_report_send';
	}
}
?>