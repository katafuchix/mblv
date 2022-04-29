<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ץ�ե�������������ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfOptionMoveDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'config_user_prof_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'config_user_prof_option_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'up' => array(
			'name'		=> '��',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'down' => array(
			'name'		=> '��',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �����ץ�ե�������������ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfOptionMoveDo extends Tv_ActionAdminOnly
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
		// ͥ���ٹ���
		$configUserProfOptionManager =& $this->backend->getManager('ConfigUserProfOption');
		
		if($this->af->get('up')){
			$configUserProfOptionManager->moveUp($this->af->get('config_user_prof_option_id'));
		}elseif($this->af->get('down')){
			$configUserProfOptionManager->moveDown($this->af->get('config_user_prof_option_id'));
		}
		return 'admin_config_user_prof_edit';
	}
}
?>