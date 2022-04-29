<?php
/**
 * View.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������������̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleView extends Tv_ListViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		// �ȥԥå������
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		$this->af->setApp('article', $article->getNameObject());
		
		// �ȥԥå���ƼԤ����
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$article->get('user_id')
		);
		$this->af->setApp('user', $user->getNameObject());
		
		// ���ߥ�˥ƥ������
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$article->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
		
		// �����Ȥ�����ʥꥹ�ȥӥ塼���Ѥ����
		$sql_where = 'a.community_article_id = ? AND ' .
			'c.community_comment_status = 1 ' .
			'AND a.community_article_id = c.community_article_id ' .
			'AND c.user_id = u.user_id ' .
			'AND a.community_article_status = 1 ' .
			'AND u.user_status = 2';
		$sql_values = array($this->af->get('community_article_id'));
		
		$this->listview = array(
			'action_name'	=> 'user_community_article_view',
			'sql_select'
				=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,'.
				'a.community_article_id,' .
				'c.community_article_id,c.community_comment_id,' .
				'c.community_comment_body,c.community_comment_created_time,' .
				'c.community_comment_hash,c.image_id',
			'sql_from'		=> 'user as u, community_comment as c, community_article as a',
			'sql_where'		=> $sql_where,
			'sql_order'		=> 'c.community_comment_created_time DESC',
			'sql_values'	=> $sql_values,
			'sql_num'	=> 5,
		);
		
		// �桼���θ����������
		$user = $this->session->get('user');
		$community_member_manager = &$this->backend->getManager('CommunityMember');
		$user_status = $community_member_manager->getUserStatus(
			$article->get('community_id'),
			$user['user_id']
		);
		$this->af->setApp('user_status', $user_status);
	}
}
?>