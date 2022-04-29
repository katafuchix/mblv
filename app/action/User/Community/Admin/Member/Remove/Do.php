<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������ԥ��С�����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'action/User/Community/Base/AdminOnly.php';
class Tv_Form_UserCommunityAdminMemberRemoveDo extends Tv_ActionForm
{
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'community_member_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'remove' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ������ԥ��С�����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityAdminMemberRemoveDo extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if( $this->af->get('back') ) return 'user_community_admin_member';
		
		if($this->af->validate() > 0)
			return 'user_home';
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
		// �������С��򥳥ߥ�˥ƥ������������
		$community_id = $this->af->get('community_id');
		
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$this->af->get('community_member_id')
		);
		if($communityMember->isValid()){
			if($communityMember->get('community_member_status') == 2){
				$this->ae->add(null, '', E_USER_COMMUNITY_MEMBER_REMOVE_ADMIN);
				return 'user_error';
			}
			$communityMember->set('community_member_status', 0);
			$communityMember->update();
		}
		
		$this->ae->add(null, '', I_USER_COMMUNITY_MEMBER_REMOVE_DONE);
		return 'user_community_admin_member';
	}
}
?>