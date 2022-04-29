<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ管理者権限譲渡確認アクションフォーム
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
 * ユーザコミュニティ管理者権限譲渡確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAdminPowerGiveConfirm extends Tv_Action_UserCommunityBaseAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{	
		if($this->af->validate() > 0) return 'user_home';
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
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