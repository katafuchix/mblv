<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記編集確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once('Do.php');
class Tv_Form_UserBlogArticleEditConfirm extends Tv_Form_UserBlogArticleEditDo
{
}

/**
 * ユーザ日記編集確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		// ナパボードの場合はタイトルを必須としない
		if($this->af->get('twitter_status')){
			$this->af->form['blog_article_body']['required'] = false;
			$this->af->form['blog_article_title']['max'] = 140;
			$this->af->form['blog_article_title']['name'] = '投稿';
			$this->af->form['blog_article_public']['required'] = false;
		}
		
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
