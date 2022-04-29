<?php
/**
 * AdminOnly.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ߥ�˥ƥ������ͤΤߤ����������Ǥ�����쥢������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
// ��:ActionForm��community_id��¸�ߤ��ʤ���Фʤ�ޤ���
class Tv_Action_UserCommunityBaseAdminOnly extends Tv_ActionUserOnly
{
	/**
	 * ǧ��
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
			// ������
			return null;
		}else{
			// �����������¤ʤ�
			$this->ae->add(null, '', E_USER_ACCESS_DENIED);
			return 'user_error';
		}
	}
}
?>