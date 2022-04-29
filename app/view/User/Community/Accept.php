<?php
/**
 * Accept.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ���ߥ�˥ƥ����þ�ǧ���̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityAccept extends Tv_ViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		$user = $this->session->get('user');

		// ��ʬ�������ԤΥ��ߥ�˥ƥ����������
		$communityMember = &new Tv_CommunityMember($this->backend);
		$communityList = $communityMember->searchProp(
			array('community_id'),
			array(
				'user_id' => $user['user_id'],
				'community_member_status' => 2,
			)
		);
		
		// ���ߥ�˥ƥ����Ȥ˽���
		foreach($communityList[1] as $i => $community){
			// ��ǧ�Ԥ��桼�����������
			$userList = $communityMember->searchProp(
				array('community_member_id', 'user_id'),
				array(
					'community_id' => $community['community_id'],
					'community_member_status' => 3,
				)
			);

			if($userList[0] > 0){
				// ���ߥ�˥ƥ�̾�����
				$communityObj = &new Tv_Community(
					$this->backend,
					'community_id',
					$community['community_id']
				);
				$communityList[1][$i]['community_title']
					= $communityObj->get('community_title');

				// ��ǧ�Ԥ��Υ桼���Υ˥å��͡�������
				foreach($userList[1] as $j => $waitingUser){
					$userObj = &new Tv_User(
						$this->backend,
						'user_id',
						$waitingUser['user_id']
					);
					$userList[1][$j]['user_nickname'] = $userObj->get('user_nickname');
				}
			}
			
			// ��ǧ�Ԥ��桼����̵ͭ��Ƚ���$user_list[0]�����Ѥ��뤿��
			// ���ιԤ�if�γ����֤�
			$communityList[1][$i]['user_list'] = $userList;
		}

		$this->af->setApp('waiting_user_list', $communityList);
	}
}
?>