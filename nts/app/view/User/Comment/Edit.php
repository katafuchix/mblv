<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコメント編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommentEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		$this->af->setApp('comment', $comment->getNameObject());
	}
}
?>
