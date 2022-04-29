<?php
/**
 * Member.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������ԥ��в��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityAdminMember extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
		
		$communityMember =& new Tv_CommunityMember($this->backend);
		/*$whereStatus->addObject(
			'community_member_status',
			new Ethna_AppSearchObject(2, OBJECT_CONDITION_EQ),
			OBJECT_CONDITION_OR
		);*/
		
		// ���Ў��ƎÎ������Ԥ򸡺�
		$communityOwnerList = $communityMember->searchProp(
			array('user_id'),
			array(
				'community_id'				=> $this->af->get('community_id'),
				'community_member_status'	=> new Ethna_AppSearchObject(2, OBJECT_CONDITION_EQ)
			)
		);
		
		if( $communityOwnerList[0] == 1 ) {
			$owner =& new Tv_User(
				$this->backend,
				'user_id',
				$communityOwnerList[1][0]['user_id']
			);
			$this->af->setApp('owner_nickname', $owner->getName('user_nickname'));
		}
		
		// ���Ў��ƎÎ����üԤ򸡺�
		$communityMemberList = $communityMember->searchProp(
			array('user_id', 'community_member_id'),
			array(
				'community_id'				=> $this->af->get('community_id'),
				'community_member_status'	=> new Ethna_AppSearchObject(1, OBJECT_CONDITION_EQ)
			)
		);
		
		foreach($communityMemberList[1] as $key => $item) {
			$user =& new Tv_User(
				$this->backend,
				'user_id',
				$item['user_id']
			);
			$communityMemberList[1][$key]['user_nickname']	 = $user->get('user_nickname');
			$communityMemberList[1][$key]['new_admin_user_id'] = $user->get('user_id');
			$communityMemberList[1][$key]['user_status']	   = $user->get('user_status');
		}
		$this->af->setApp('memberList', $communityMemberList[1]);
	}
}
?>
