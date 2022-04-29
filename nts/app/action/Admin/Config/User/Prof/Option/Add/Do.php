<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ץ�ե���������������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfOptionAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'config_user_prof_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
		'config_user_prof_option_name' => array(
			'name'		=> '����̾',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
		'add' => array(
			'name'		=> '�ɲ�',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �����ץ�ե���������������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfOptionAddDo extends Tv_ActionAdminOnly
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
		// ��������Ͽ
		$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
		$filter = array(
			'config_user_prof_id' => new Ethna_AppSearchObject($this->af->get('config_user_prof_id'), OBJECT_CONDITION_EQ	)
		);
		$configUserProfOptionList = $configUserProfOption->searchProp(
			array('config_user_prof_option_order'),
			$filter,
			array('config_user_prof_option_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfOptionList[0])
			$orderMax = $configUserProfOptionList[1][0]['config_user_prof_option_order'];
		else
			$orderMax = 0;
		
		$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
		$configUserProfOption->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProfOption->set('config_user_prof_option_order', $orderMax + 1);
		// ��Ͽ
		$configUserProfOption->add();
		
		$this->af->set('config_user_prof_option_name', '');
		return 'admin_config_user_prof_edit';
	}
}
?>