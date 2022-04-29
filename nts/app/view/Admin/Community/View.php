<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティ一覧ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityView extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		/* コミュニティ */
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
		
		/* カテゴリ */
		$cca =& new Tv_CommunityCategory(
			$this->backend,
			'community_category_id',
			$community->get('community_category_id')
		);
		$this->af->setApp('category', $cca->get('community_category_name'));
		
		/* 参加条件と公開レベル */
		$communityManager =& $this->backend->getManager('Community');
		$joinConditionList = $communityManager->getAttrList('community_join_condition');
		$this->af->setApp('joinCondition', $joinConditionList[$community->get('community_join_condition')]['name']);
		
		/* トピック作成の権限 */
		$topicPermissionList = $communityManager->getAttrList('community_topic_permission');
		$this->af->setApp('topicPermission', $topicPermissionList[$community->get('community_topic_permission')]['name']);
		
		/* 管理人 */
		$communityAdmin =& new Tv_CommunityMember(
			$this->backend,
			array('community_id', 'community_member_status'),
			array($this->af->get('community_id'), 2)
		);
		$administrator =& new Tv_User(
			$this->backend,
			array('user_id'),
			$communityAdmin->get('user_id')
		);
		$this->af->setApp('admin', $administrator->getNameObject());
		
		/* 新着トピック */
		$article =& new Tv_CommunityArticle($this->backend);
		$articleList = $article->searchProp(
			array('community_article_id', 'community_article_title', 'community_article_comment_num'),
			array(
				'community_id' => $this->af->get('community_id'),
				'community_article_status' => 1,
			),
			array('community_article_comment_time' => OBJECT_SORT_DESC),
			0,
			3
		);
		$this->af->setApp('articleList', $articleList[1]);
		
		/* ユーザの権限等 */
		$user = $this->session->get('user');
		$communityMemberManager =& $this->backend->getManager('CommunityMember');
		$userStatus = $communityMemberManager->getUserStatus(
			$this->af->get('community_id'),
			$user['user_id']
		);
		$this->af->setApp('userStatus', $userStatus);
	}
}
?>
