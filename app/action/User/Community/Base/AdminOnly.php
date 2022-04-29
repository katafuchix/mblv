<?php
/**
 * AdminOnly.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * コミュニティ管理人のみがアクセスできる基底アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
// 注:ActionFormにcommunity_idが存在しなければなりません
class Tv_Action_UserCommunityBaseAdminOnly extends Tv_ActionUserOnly
{
	/**
	 * 認証
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		parent::authenticate();
		
		$user = $this->session->get('user');
		$communityMemberManager =& $this->backend->getManager('CommunityMember');
		
		$userStatus = $communityMemberManager->getUserStatus(
			$this->af->get('community_id'),
			$user['user_id']
		);
		if($userStatus['is_admin']){
			// 管理者
			return null;
		}else{
			// アクセス権限なし
			$this->ae->add(null, '', E_USER_ACCESS_DENIED);
			return 'user_error';
		}
	}
}
?>