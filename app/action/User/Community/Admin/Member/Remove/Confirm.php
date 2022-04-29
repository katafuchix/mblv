<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ管理者メンバー削除確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'action/User/Community/Base/AdminOnly.php';
class Tv_Form_UserCommunityAdminMemberRemoveConfirm extends Tv_ActionForm
{
	var $use_validator_plugin = true;
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
	);
}

/**
 * ユーザコミュニティ管理者メンバー削除確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityAdminMemberRemoveConfirm extends Tv_Action_UserCommunityBaseAdminOnly
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
		$communityMember =& new Tv_CommunityMember(
			$this->backend,
			'community_member_id',
			$this->af->get('community_member_id')
		);
		
		if( !$communityMember->isValid() ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_MEMBER_NOT_FOUND);
			return 'user_community_admin_member';
		}
		
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$communityMember->get('user_id')
		);
		
		if( !$user->isValid() ) {
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_community_admin_member';
		}
		
		$this->af->setApp( 'user', $user->getNameObject() );
		return 'user_community_admin_member_remove_confirm';
	}
}

?>