<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記コメント追加アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_id' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'blog_article_id' => array(
			'required'	=> true,
		),
	);
}
/**
 * ユーザ日記コメント追加アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentAdd extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		return 'user_blog_article_comment_add';
	}
}
?>