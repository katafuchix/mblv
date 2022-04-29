<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������ѹ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserConfigReceiveEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_message_1_status' => array(
		),
		'user_message_2_status' => array(
		),
//		'user_message_3_status' => array(
//		),
//		'user_message_4_status' => array(
//		),
		'edit' => array(
			'name'		=> '���ѹ����롡',
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}
/**
 * �桼�������ѹ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfigReceiveEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_config_receive_edit';
		
		return null;
	}
	
	function perform()
	{
		// ���å�����������
		$sess = $this->session->get('user');
		
		// �᡼���������򥢥åץǡ��Ȥ���
		$o =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->update();
		
		return 'user_config_receive_edit_done';
	}
}
?>