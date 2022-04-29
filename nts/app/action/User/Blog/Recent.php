<?php
/**
 * Recent.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ最新記事アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogRecent extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
	);
}

/**
 * ユーザ最新記事アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogRecent extends Tv_ActionUserOnly
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
		return 'user_blog_recent';
	}
}
?>
