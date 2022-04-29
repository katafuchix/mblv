<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ブログ記事表示画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogCommentView extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 記事情報取得
		$article = &new Tv_BlogArticle($this->backend,
			array('blog_article_id', 'blog_article_status'),
			array($this->af->get('blog_article_id'), 1)
			);
		if($article->isValid()){
			$this->af->setApp('article', $article->getNameObject());
		}else{ 
			// 記事が存在しない場合
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		// 前の記事を取得
		$preArticle = $article->searchProp(
			array('blog_article_id'),
			array('blog_article_created_time' => new Ethna_AppSearchObject($article->get('blog_article_created_time'), OBJECT_CONDITION_LT),
				'user_id' => $article->get('user_id'),
				'blog_article_status' => 1,
				),
			array('blog_article_id' => OBJECT_SORT_DESC),
			0,
			1
			);
		if($preArticle[0])
			$this->af->setApp('pre_blog_article_id', $preArticle[1][0]['blog_article_id']);
		
		// 次の記事を取得
		$postArticle = $article->searchProp(
			array('blog_article_id'),
			array('blog_article_created_time' => new Ethna_AppSearchObject($article->get('blog_article_created_time'), OBJECT_CONDITION_GT),
				'user_id' => $article->get('user_id'),
				'blog_article_status' => 1,
				),
			array('blog_article_id' => OBJECT_SORT_ASC),
			0,
			1
			);
		if($postArticle[0])
			$this->af->setApp('post_blog_article_id', $postArticle[1][0]['blog_article_id']);
		
		// コメントを取得
		// リストビュー
		$sqlWhere = 'a.blog_article_id = ? ' .
			'AND c.blog_comment_status = 1 ' .
			'AND a.blog_article_id = c.blog_article_id ' .
			'AND c.user_id = u.user_id ' .
			'AND a.blog_article_status = 1 ' .
			'AND u.user_status = 2';
		$sqlValues = array($this->af->get('blog_article_id'));
		
		$this->listview = array(
			'action_name'	=> 'user_blog_comment_view',
			'sql_select'
				=> 'u.user_id,u.user_nickname,c.user_id,c.blog_comment_id,' .
				'c.blog_article_id,c.blog_comment_created_time,c.blog_comment_body,' .
				'c.blog_comment_hash,c.image_id,a.blog_article_id,' .
				'a.blog_article_status',
			'sql_from'		=> 'user as u, blog_comment as c, blog_article as a',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.blog_comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 10,
		);
		
		// ユーザ情報を出力
		$user = &new Tv_User($this->backend,
			'user_id',
			$article->get('user_id')
			);
		$this->af->setApp('user', $user->getNameObject()); 
	}
}

?>
