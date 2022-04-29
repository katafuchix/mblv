<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記コメント編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogCommentEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_comment_id' => array(
			'required'	=> true,
		),
	);
}
/**
 * ユーザ日記コメント編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogCommentEdit extends Tv_ActionUserOnly
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
		// 日記コメントオブジェクトを取得
		$comment =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		$comment->exportForm();
		
		return 'user_blog_comment_edit';
	}
}

?>
