<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ���ߥ�˥ƥ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityView extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ���ߥ�˥ƥ�����
		$community = &new Tv_Community($this->backend,
			'community_id',
			$this->af->get('community_id')
			);
		$this->af->setApp('community', $community->getNameObject());
		
		// ���ƥ������
		$cca = &new Tv_CommunityCategory($this->backend,
			'community_category_id',
			$community->get('community_category_id')
			);
		$this->af->setApp('category', $cca->get('community_category_name'));
		
		// �����ͤ򸡺�
		$community_admin = &new Tv_CommunityMember($this->backend);
		$community_admin_list = $community_admin->searchProp(
			array('user_id'),
			array('community_id' => $this->af->get('community_id'),
				'community_member_status' => 2,
				)
			);
		// �����;������
		$administrator = &new Tv_User($this->backend,
			array('user_id'),
			$community_admin_list[1][0]['user_id']
			);
		$this->af->setApp('admin', $administrator->getNameObject());
		
		// ����ȥԥå���������
		$sqlWhere = "ca.community_id = ? AND ca.community_article_status = 1 AND ca.user_id = u.user_id AND u.user_status = 2";
		$sqlValues = array($this->af->get('community_id'));
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'community_article ca, user u',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ca.community_article_comment_time LIMIT 0,3',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('article_list', $r); 
		
/*
		$article = &new Tv_CommunityArticle($this->backend);
		$articleList = $article->searchProp(
			array('community_article_id', 'community_article_title', 'community_article_comment_num', 'community_article_created_time'),
			array('community_id' => $this->af->get('community_id'),
				'community_article_status' => 1,
				),
			array('community_article_comment_time' => OBJECT_SORT_DESC),
			0,
			3
			);
		$this->af->setApp('article_list', $articleList[1]);
*/		
		// �桼���θ����������
		$user = $this->session->get('user');
		$communityMemberManager = &$this->backend->getManager('CommunityMember');
		$userStatus = $communityMemberManager->getUserStatus($this->af->get('community_id'),
			$user['user_id']
			);
		$this->af->setApp('user_status', $userStatus);
	}
}
?>