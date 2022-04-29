<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ץ�ե����������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigUserProfAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'config_user_prof_name' => array(
			'name'		=> '����̾',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'max'		=> 255,
		),
		'config_user_prof_type' => array(
			'name'		=> '�ե��������',
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'min'		=> 1,
			'max'		=> 5,
		),
		'add' => array(
			'name'		=> '�ɲ�',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �����ץ�ե����������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigUserProfAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_user_prof';
		// 2��POST�ξ��
		if(Ethna_Util::isDuplicatePost()) return 'admin_config_user_prof';
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
		// �ץ�ե����������Ͽ
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array('config_user_prof_order'),
			array(),
			array('config_user_prof_order' => OBJECT_SORT_DESC),
			0,
			1
		);
		if($configUserProfList[0])
			$orderMax = $configUserProfList[1][0]['config_user_prof_order'];
		else
			$orderMax = 0;
					
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProf->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$configUserProf->set('config_user_prof_order', $orderMax + 1);
		// ��Ͽ
		$configUserProf->add();
		
		$this->af->set('config_user_prof_name', '');
		return 'admin_config_user_prof';
	}
}
?>