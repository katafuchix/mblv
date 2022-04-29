<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ���ǧ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityAcceptDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_member_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'accept' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_BOOLEAN
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ���ǧ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAcceptDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_community_accept';
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
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$this->af->get('community_member_id')
		);
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$communityMember->get('community_id')
		);
		
		if($this->af->get('accept')){
			/* ��ǧ */
			$communityMember->set('community_member_status', 1);
			$communityMember->update();
			
			$community->set('community_member_num', $community->get('community_member_num') + 1);
			$community->update();
			
			/* minimail */
			
		}else{
			/* ���� */
			$communityMember->set('community_member_status', 0);
			$communityMember->update();
			
			/* minimail */
			
		}
		return 'user_community_accept';
	}
}

?>
