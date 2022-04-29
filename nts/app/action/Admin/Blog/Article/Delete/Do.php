<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理日記削除実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBlogArticleDeleteDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'blog_article_id' => array(
		),
	);
}

/**
 * 管理日記削除実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBlogArticleDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->validate() > 0) return 'admin_blog_article_search';
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
		// 日記削除（※物理削除する
		$article =& new Tv_BlogArticle(
			$this->backend,
			'blog_article_id',
			$this->af->get('blog_article_id')
		);
		$article->delete();
		
		// フォーム値をクリアする
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_BLOG_ARTICLE_EDIT_DONE);
		return 'admin_blog_article_list';
	}
}
?>