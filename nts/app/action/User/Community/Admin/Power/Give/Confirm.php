<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������Ը��¾��ϳ�ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('action/User/Community/Base/AdminOnly.php');

class Tv_Form_UserCommunityAdminPowerGiveConfirm extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
		'new_admin_user_id' => array(
			'required'	=> true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ������Ը��¾��ϳ�ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAdminPowerGiveConfirm extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{	
		if($this->af->validate() > 0) return 'user_home';
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
		$new_admin_user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('new_admin_user_id')
		);
		
		if( !$new_admin_user->isValid() ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_ADMIN_GIVE);
			return 'user_community_admin_member';
		}
		$this->af->setApp('community_id', $this->af->get('community_id') );
		
		$this->af->setApp('new_admin_user', $new_admin_user->getNameObject() );
		return 'user_community_admin_power_give_confirm';
	}
}
?>