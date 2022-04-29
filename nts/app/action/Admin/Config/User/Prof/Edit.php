<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ץ�ե���������Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfEdit extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'config_user_prof_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'edit' => array(
			'name'		=> '�Խ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �����ץ�ե���������Խ����������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfEdit extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'action_admin_config_user_prof';
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
		return 'admin_config_user_prof_edit';
	}
}
?>