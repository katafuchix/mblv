<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ����ƥ�����Ͽ���������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigCommunityCategoryAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'community_category_name' => array(
			'name'		=> '���ߥ�˥ƥ����ƥ���̾',
			'required'	=> true,
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �������ߥ�˥ƥ����ƥ�����Ͽ���������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigCommunityCategoryAddDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'admin_config_community_category';
		
		// �����ƥ��顼
		if (Ethna_Util::isDuplicatePost() ) return 'admin_config_community_category';
		
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
		// ���ߥ�˥ƥ����ƥ��ꥪ�֥��������ɲ�
		$o =& new Tv_CommunityCategory($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->add();
		
		// �ե������ͤ򥯥ꥢ
		$this->af->clearFormVars();
		
		// ��å�����
		$this->ae->add(null, '', I_ADMIN_CONFIG_COMMUNITY_CATEGORY_ADD_DONE);
		
		return 'admin_config_community_category';
	}
}
?>