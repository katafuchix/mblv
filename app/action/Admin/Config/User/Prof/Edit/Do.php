<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ץ�ե���������Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigUserProfEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var    array   �ե���������� */
	var $form = array(
		'config_user_prof_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'config_user_prof_name' => array(
			'name'		=> '����̾',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'max'		=> 255,
		),
		'back' => array(
			'name'		=> '���',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
		'submit' => array(
			'name'		=> '�Խ���λ',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �����ץ�ե���������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminConfigUserProfEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// back�ξ��
		if($this->af->get('back')){
			$this->af->set('config_user_prof_name',null);
			return 'admin_config_user_prof';
		}
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'admin_config_user_prof_edit';
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
		// �Խ��оݤΥ����ƥ�����
		$configUserProf =& new Tv_ConfigUserProf(
			$this->backend,
			'config_user_prof_id',
			$this->af->get('config_user_prof_id')
		);
		if(!$configUserProf->isValid()) return 'admin_config_user_prof';
		
		// DB����
		$configUserProf->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProf->update();
		
		$this->af->set('config_user_prof_name',null);
		return 'admin_config_user_prof';
	}
}
?>