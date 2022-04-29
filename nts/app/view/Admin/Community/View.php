<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ������ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityView extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		/* ���ߥ�˥ƥ� */
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
		
		/* ���ƥ��� */
		$cca =& new Tv_CommunityCategory(
			$this->backend,
			'community_category_id',
			$community->get('community_category_id')
		);
		$this->af->setApp('category', $cca->get('community_category_name'));
		
		/* ���þ��ȸ�����٥� */
		$communityManager =& $this->backend->getManager('Community');
		$joinConditionList = $communityManager->getAttrList('community_join_condition');
		$this->af->setApp('joinCondition', $joinConditionList[$community->get('community_join_condition')]['name']);
		
		/* �ȥԥå������θ��� */
		$topicPermissionList = $communityManager->getAttrList('community_topic_permission');
		$this->af->setApp('topicPermission', $topicPermissionList[$community->get('community_topic_permission')]['name']);
		
		/* ������ */
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
		
		/* ����ȥԥå� */
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
		
		/* �桼���θ����� */
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
