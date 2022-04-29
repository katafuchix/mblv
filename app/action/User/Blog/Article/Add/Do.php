<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記登録アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogArticleAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_title' => array(
			'required'		=> true,
		),
		'blog_article_body' => array(
			'required'		=> true,
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'submit' => array(
		),
		'confirm' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザ日記登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleAddDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_blog_article_add';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_blog_article_add';
		
		// 二重投稿エラー
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_blog_article_add';
		}
		
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
		// 日記記事オブジェクト追加
		$article =& new Tv_BlogArticle($this->backend);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$r = $article->add();
		if(Ethna::isError($r)) return 'user_blog_article_add';
		
		// 日記記事IDをセット
		$this->af->setApp('blog_article_id', $article->getId());
		// 日記記事ハッシュをセット
		$this->af->setApp('blog_article_hash', $article->get('blog_article_hash'));
		
		return 'user_blog_article_add_done';
	}
}
?>