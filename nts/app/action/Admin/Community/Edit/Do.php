<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ��Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCommunityEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'community_id' => array(
//			'name'		=> '���ߥ�˥ƥ�ID',
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'community_title' => array(
//			'name'			=> '���ߥ�˥ƥ������ȥ�',
		),
		'community_category_id' => array(
//			'name'		=> '���ߥ�˥ƥ����ƥ���',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_category',
		),
		'community_join_condition' => array(
//			'name'			=> '���þ��ȸ����ڎ͎ގ�',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
//			'name'			=> '�Ďˎߎ��������θ���',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_topic_permission',
		),
		'community_description' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'delete_image' => array(
		),
	);
}

/**
 * �������ߥ�˥ƥ��������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCommunityEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_edit';
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
		// ���֥������Ȥ����
		$o =& new Tv_Community($this->backend,'community_id',$this->af->get('community_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// �����С��饤��
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_community_edit';
		
		// ��å�����
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_EDIT_DONE);
		
		return 'admin_community_edit_done';
	}
}
?>