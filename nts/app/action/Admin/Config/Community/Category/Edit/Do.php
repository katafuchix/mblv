<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ����ƥ����Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigCommunityCategoryEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'community_category_id' => array(
			'name'		=> '���ߥ�˥ƥ����ƥ���ID',
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_category_name' => array(
			'name'		=> '���ߥ�˥ƥ����ƥ���̾',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
	);
}

/**
 * �������ߥ�˥ƥ����ƥ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigCommunityCategoryEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_community_category_edit';
		
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
		// ���ߥ�˥ƥ����ƥ��ꥪ�֥������Ȥ򹹿�
		$o =& new Tv_CommunityCategory($this->backend,'community_category_id',$this->af->get('community_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->update();
		
		// �ե������ͤ򥯥ꥢ
		$this->af->clearFormVars();
		
		// ��å�����
		$this->ae->add(null, '', I_ADMIN_CONFIG_COMMUNITY_CATEGORY_EDIT_DONE);
		
		return 'admin_config_community_category';
	}
}
?>