<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �֥�����ɽ�����̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
//class Tv_View_UserBlogArticleView extends Tv_ListViewClass
class Tv_View_UserBlogArticleView extends Tv_ListViewClass_BlogArticle
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �����������
		$article = &new Tv_BlogArticle($this->backend,
			array('blog_article_id', 'blog_article_status'),
			array($this->af->get('blog_article_id'), 1)
			);
		if($article->isValid()){
			$this->af->setApp('article', $article->getNameObject());
		}else{ 
			// ������¸�ߤ��ʤ����
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		// ɮ�Ԥ����
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$article->get('user_id')
		);
		$this->af->setApp('user', $user->getNameObject());
		
		// �����桼����ɮ�Ԥ�ͧã���ɤ��������
		$um =& $this->backend->getManager('user');
		$user_session = $this->session->get('user');
		$relation = $um->getUserRelation($article->get('user_id'), $user_session['user_id']);
		
		// ���ε��������
		$where = array(
			'blog_article_created_time' => new Ethna_AppSearchObject($article->get('blog_article_created_time'), OBJECT_CONDITION_LT),
			'user_id' => $article->get('user_id'),
			'blog_article_status' => 1,
			'twitter_status' => 0,
		);
		switch($relation){
		case 0:	// ͧã�ǤϤʤ�
			$where['blog_article_public'] = 1;
			break;
		case 1:	// ͧã
			$where['blog_article_public'] = new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE);
			break;
		}
		$preArticle = $article->searchProp(
			array('blog_article_id'),
			$where,
			array('blog_article_id' => OBJECT_SORT_DESC),
			0,
			1
			);
		if($preArticle[0])
			$this->af->setApp('pre_blog_article_id', $preArticle[1][0]['blog_article_id']);
		
		// ���ε��������
		$where = array(
			'blog_article_created_time' => new Ethna_AppSearchObject($article->get('blog_article_created_time'), OBJECT_CONDITION_GT),
			'user_id' => $article->get('user_id'),
			'blog_article_status' => 1,
			'twitter_status' => 0,
		);
		switch($relation){
		case 0:	// ͧã�ǤϤʤ�
			$where['blog_article_public'] = 1;
			break;
		case 1:	// ͧã
			$where['blog_article_public'] = new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE);
			break;
		}
		$postArticle = $article->searchProp(
			array('blog_article_id'),
			$where,
			array('blog_article_id' => OBJECT_SORT_ASC),
			0,
			1
			);
		if($postArticle[0])
			$this->af->setApp('post_blog_article_id', $postArticle[1][0]['blog_article_id']);
		
		// �����Ȥ����
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'a.blog_article_id = ? ' .
				'AND c.blog_comment_status = 1 ' .
				'AND a.blog_article_id = c.blog_article_id ' .
				'AND c.user_id = u.user_id ' .
				'AND a.blog_article_status = 1 AND u.user_status = 2';
		$sqlValues = array($this->af->get('blog_article_id'));
		$this->listview = array(
			'action_name'	=> 'user_blog_article_view',
			'sql_select'
				=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,' .
				'c.user_id,c.blog_comment_id,c.blog_article_id, a.user_id as blog_article_user_id, ' .
				'c.blog_comment_created_time,c.blog_comment_body,c.blog_comment_hash,' .
				'c.image_id,a.blog_article_id,a.blog_article_status,c.blog_comment_notice',
			'sql_from'		=> 'user as u, blog_comment as c, blog_article as a',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.blog_comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 5,
		);
	}
}

?>
