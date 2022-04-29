<?php
/**
 * Member.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ管理者メンバ画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommunityAdminMember extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
		
		$communityMember =& new Tv_CommunityMember($this->backend);
		
		// ｺﾐｭﾆﾃｨ管理者を検索
		$param = array(
			'sql_select'	=> ' user_id ',
			'sql_from'		=> ' community_member ',
			'sql_where'		=> ' community_id = ? AND community_member_status = ? ',
			'sql_values'	=> array( $this->af->get('community_id'), 2 ),
		);
		$communityOwnerList = $um->dataQuery($param);
		
		if( count($communityOwnerList) > 0 ) {
			$owner =& new Tv_User(
				$this->backend,
				'user_id',
				$communityOwnerList[0]['user_id']
			);
			$this->af->setApp('owner_nickname', $owner->getName('user_nickname'));
		}
		
		// ｺﾐｭﾆﾃｨ参加者を検索
		$this->listview = array(
			'action_name'	=> 'user_community_admin_member',
			'sql_select'	=> '*',
			'sql_from'		=> 'community_member c , user u',
			'sql_where'		=> 'c.user_id = u.user_id AND c.community_id = ? AND c.community_member_status = ? AND u.user_status = ?',
			'sql_values'	=> array( $this->af->get('community_id'), 1 ,2),
			'sql_num'		=> 5,
		);
		
	}
}
?>