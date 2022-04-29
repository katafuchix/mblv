<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ記事コメント編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogCommentEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
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
	}
}
?>