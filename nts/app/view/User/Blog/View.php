<?php
/**
 * View_.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 日記新着記事画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogView extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ユーザ情報とブログのタイトル（ユーザのニックネーム）
		$userId = $this->af->get('user_id');
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return;
		$this->af->setApp('blog_title', $user->get('user_nickname'));
		$this->af->setApp('user', $user->getNameObject());
		
		// 新着日記（新しい順に最大5件）
		$where = array(
			'user_id' => $userId,
			'blog_article_status' => 1,
		//	'twitter_status' => 0,
		);
		// 閲覧ユーザと筆者は友達かどうかを取得
		$um =& $this->backend->getManager('user');
		$user_session = $this->session->get('user');
		switch($um->getUserRelation($this->af->get('user_id'), $user_session['user_id']))
		{
		case 0: // 友達ではない
			$where['blog_article_public'] = 1;
			break;
		case 1: // 友達
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