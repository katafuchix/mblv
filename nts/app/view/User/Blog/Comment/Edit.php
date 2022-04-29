<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ記事コメント編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogCommentEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// コメントを取得
		$comment =& new Tv_BlogComment(
			$this->backend,
			'blog_comment_id',
			$this->af->get('blog_comment_id')
		);
		
		// コメントのチェック
		if( $comment->isValid() && $comment->get('blog_comment_status') == 1 ) {
			// コメントが存在する場合
			$this->af->setApp('comment', $comment->getNameObject());
		} else {
			// コメントが存在しない場合
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
		}
		
		// ブログ記事を取得する
		$article = & new Tv_BlogArticle($this->backend,'blog_article_id',$comment->get('blog_article_id'));
		if($article->isValid()){
			$this->af->setApp('article', $article->getNameObject());
		}
	}
}
?>
