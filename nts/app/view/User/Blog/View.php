<?php
/**
 * View_.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������嵭�����̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogView extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �桼������ȥ֥��Υ����ȥ�ʥ桼���Υ˥å��͡����
		$userId = $this->af->get('user_id');
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return;
		$this->af->setApp('blog_title', $user->get('user_nickname'));
		$this->af->setApp('user', $user->getNameObject());
		
		// ���������ʿ�������˺���5���
		$where = array(
			'user_id' => $userId,
			'blog_article_status' => 1,
		//	'twitter_status' => 0,
		);
		// �����桼����ɮ�Ԥ�ͧã���ɤ��������
		$um =& $this->backend->getManager('user');
		$user_session = $this->session->get('user');
		switch($um->getUserRelation($this->af->get('user_id'), $user_session['user_id']))
		{
		case 0: // ͧã�ǤϤʤ�
			$where['blog_article_public'] = 1;
			break;
		case 1: // ͧã
			$where['blog_article_public'] = new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE);
			break;
		}
		
		$article = &new Tv_BlogArticle($this->backend);
		$articleList = $article->searchProp(
			array('blog_article_id', 'blog_article_title', 'blog_article_created_time', 'blog_article_comment_num', 'blog_article_notice','twitter_status'),
			$where,
			array('blog_article_created_time' => OBJECT_SORT_DESC),
			0,
			5
			);
		$this->af->setApp('article_list', $articleList[1]);
	}
}

?>