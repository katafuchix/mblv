<?php
/**
 * Member.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������ԥ��С����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');
class Tv_Form_UserCommunityAdminMember extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ������ԥ��С����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAdminMember extends Tv_Action_UserCommunityBaseAdminOnly
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
		return 'user_community_admin_member';
	}
}

?>
