<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user');
		// user_idが指定されてない場合は自分の参加コミュニティ一覧を表示する
		$user_id = ($this->af->get('user_id') == '') ?
			$user_session['user_id'] : $this->af->get('user_id');
		
		// ユーザ情報を取得
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$user_id
		);
		$this->af->setApp('user_nickname', $user->get('user_nickname'));
		
		// 参加コミュニティ一覧を取得
		$communityMember =& new Tv_CommunityMember($this->backend);
		
		$filter = array(
			'user_id' => $user_id,
			'community_member_status' => new Ethna_AppSearchObject(1, OBJECT_CONDITION_GE),
		);
		$filter['community_member_status']->addObject(
			'community_member_status',
			new Ethna_AppSearchObject(2, OBJECT_CONDITION_LE),
			OBJECT_CONDITION_AND
		);
		
		$communityList = $communityMember->searchProp(
			array('community_id'),
			$filter
		);
		foreach($communityList[1] as $key => $item)
		{
			$community =& new Tv_Community(
				$this->backend,
				'community_id',
				$item['community_id']
			);
			$communityList[1][$key]['community_title'] = $community->get('community_title');
			$communityList[1][$key]['community_status'] = $community->get('community_status');
			$communityList[1][$key]['image_id'] = $community->get('image_id');
		}
		$this->af->setApp('communityList', $communityList[1]);
	}
}
?>
