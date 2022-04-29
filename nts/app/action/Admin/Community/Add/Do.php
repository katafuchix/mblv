<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ���Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCommunityAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'community_title' => array(
			'required'		=> true,
		),
		'community_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_category',
			'required'		=> true,
		),
		'community_join_condition' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_join_condition',
			'required'		=> true,
		),
		'community_topic_permission' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_topic_permission',
			'required'		=> true,
		),
		'community_description' => array(
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'user_id' => array(
			'name'			=> W_ADMIN_COMMUNITY_ADMIN_USER_ID,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
	);
}

/**
 * �������ߥ�˥ƥ���������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCommunityAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_add';
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
		$o =& new Tv_Community($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->add();
		
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_community_add';
		
		// �����ͤ���Ͽ
		$cm =& new Tv_CommunityMember($this->backend);
		$cm->set('community_id', $o->getId());
		$cm->set('user_id', $this->af->get('user_id'));
		$cm->set('community_member_status', 2);
		$r = $cm->add();
		if(Ethna::isError($r)){
			$o->remove();
			return 'admin_community_add';
		}
		
		// ��å�����
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_ADD_DONE);
		
		return 'admin_community_add_done';
	}
}
?>