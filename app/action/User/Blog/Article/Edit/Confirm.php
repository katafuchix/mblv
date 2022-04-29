<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記編集確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once('Do.php');
class Tv_Form_UserBlogArticleEditConfirm extends Tv_Form_UserBlogArticleEditDo
{
}

/**
 * ユーザ日記編集確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleEditConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン
		if($this->af->get('back')) return 'user_blog_article_view';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_blog_article_edit';
		
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
		// HIDDENフォームの生成はViewで行う
		return 'user_blog_article_edit_confirm';
	}
}
?>