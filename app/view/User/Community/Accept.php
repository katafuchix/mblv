<?php
/**
 * Accept.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * コミュニティ参加承認画面ビュークラス
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityAccept extends Tv_ViewClass
{
	/**
	 *	画面表示前処理
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		$user = $this->session->get('user');

		// 自分が管理者のコミュニティ一覧を取得
		$communityMember = &new Tv_CommunityMember($this->backend);
		$communityList = $communityMember->searchProp(
			array('community_id'),
			array(
				'user_id' => $user['user_id'],
				'community_member_status' => 2,
			)
		);
		
		// コミュニティごとに処理
		foreach($communityList[1] as $i => $community){
			// 承認待ちユーザ一覧を取得
			$userList = $communityMember->searchProp(
				array('community_member_id', 'user_id'),
				array(
					'community_id' => $community['community_id'],
					'community_member_status' => 3,
				)
			);

			if($userList[0] > 0){
				// コミュニティ名を取得
				$communityObj = &new Tv_Community(
					$this->backend,
					'community_id',
					$community['community_id']
				);
				$communityList[1][$i]['community_title']
					= $communityObj->get('community_title');

				// 承認待ちのユーザのニックネームを取得
				foreach($userList[1] as $j => $waitingUser){
					$userObj = &new Tv_User(
						$this->backend,
						'user_id',
						$waitingUser['user_id']
					);
					$userList[1][$j]['user_nickname'] = $userObj->get('user_nickname');
				}
			}
			
			// 承認待ちユーザの有無の判定に$user_list[0]を利用するため
			// この行はifの外に置く
			$communityList[1][$i]['user_list'] = $userList;
		}

		$this->af->setApp('waiting_user_list', $communityList);
	}
}
?>