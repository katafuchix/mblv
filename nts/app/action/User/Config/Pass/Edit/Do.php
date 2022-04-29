<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ѥ�����ѹ��¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigPassEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_password' => array(
			'name'		=> '��ʎߎ��܎��Ď�',
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 4,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'new_user_password' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[a-zA-Z0-9]+$/',
			'min'		=> 4,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѱѿ���4ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'edit' => array(
			'name'		=> '���ѹ����롡',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}
/**
 * �桼���ѥ�����ѹ��¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigPassEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_config_pass_edit';
		
		// ���å���󤫤�桼��������������
		$sess = $this->session->get('user');
		
		// DB����桼��������������
		$this->user = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		
		// �ܲ���ʤ�����᤹
		if($this->user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_config_pass_edit';
		}
		
		//���Ϥ��줿�ѥ���ɤ�DB������������ѥ���ɤ�Ʊ������ǧ���㤦�ʤ��᤹
		if($this->user->get('user_password') != $this->af->get('user_password')){
			$this->ae->add(null, '', E_USER_CONFIG_FORMER_PASSWORD);
			return 'user_config_pass_edit';
		}
		
		return null;
	}
	
	function perform()
	{
		//password�ѹ�
		$this->user->set('user_password', $this->af->get('new_user_password'));
		$r = $this->user->update();
		if(Ethna::isError($r)) return 'user_config_pass_edit';
		return 'user_config_pass_edit_done';
	}
}
?>
