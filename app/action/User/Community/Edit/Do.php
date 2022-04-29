<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once('action/User/Community/Base/AdminOnly.php');
class Tv_Form_UserCommunityEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_INT,
		),
		'community_title' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			'type'			=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
		),
		'community_description' => array(
			'required'		=> true,
			'form_type'	 	=> FORM_TYPE_TEXTAREA,
			'type'	  		=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 1000,
		),
		'community_category_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'	  		=> VAR_TYPE_INT,
			'option'			=> 'Util,community_category',
		),
		'community_join_condition' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'			=> VAR_TYPE_INT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'type'	  		=> VAR_TYPE_INT,
			'option'			=> 'Util,community_topic_permission',
		),
		'community_hash' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'edit_confirm' => array(
		),
		'update' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityEditDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'user_community_edit';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_community_edit';
		
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
		// ���ߥ�˥ƥ����֥������Ȥ��������
		$community =& new Tv_Community(
			$this->backend,
			array('community_id', 'community_status'),
			array($this->af->get('community_id'), 1)
		);
		// ̵���ʾ��ϥ��顼
		if(!$community->isValid()) return 'user_home';
		
		$community->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��������
		if($this->af->get('delete_image')){
			$community->deleteImage();
		}
		// �����С��饤��
		$community->update();
		
		return 'user_community_edit_done';
	}
}
?>