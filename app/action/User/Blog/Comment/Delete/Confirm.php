<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記コメント削除確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserBlogCommentDeleteConfirm extends Tv_Form_UserBlogCommentDeleteDo
{
}

/**
 * ユーザ日記コメント削除確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'user_blog_article_view';
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return 'user_blog_comment_delete_confirm';
	}
}
?>