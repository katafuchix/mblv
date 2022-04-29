<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ���Ͽ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_title' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			'type'	 		=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
		),
		'community_description' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'string_max_emoji'	=> 1000,
		),
		'community_category_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_category',
		),
		'community_join_condition' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_topic_permission',
		),
		'confirm' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'add' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'back' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ���Ͽ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���
		if($this->af->get('back')) return 'user_community_add';
		
		// ���ڥ��顼 
		if($this->af->validate() > 0) return 'user_community_add';
		
		// ������
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_community_add';
		}
		
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
		// ���ߥ�˥ƥ��ɲ�
		$community =& new Tv_Community($this->backend);
		$community->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$community->add();
		
		// ���ߥ�˥ƥ����С��ɲ�
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember($this->backend);
		$communityMember->set('community_id', $community->getId());
		$communityMember->set('user_id', $user['user_id']);
		$communityMember->set('community_member_status', 2);
		$communityMember->add();
		
		// ���ߥ�˥ƥ�ID�򥻥å�
		$this->af->setApp('community_id', $community->getId());
		// ���ߥ�˥ƥ����̻Ҥ򥻥å�
		$this->af->setApp('community_hash', $community->get('community_hash'));
		
		return 'user_community_add_done';
	}
}

?>
