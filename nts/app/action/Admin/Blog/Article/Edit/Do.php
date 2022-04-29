<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理日記編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBlogArticleEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'blog_article_id' => array(
		),
		'blog_article_title' => array(
		),
		'blog_article_body' => array(
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'delete_image' => array(
		),
	);
}

/**
 * 管理日記編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBlogArticleEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_blog_article_edit';
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
		// 記事編集
		$o =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像削除
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// オーバーライド
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_article_edit';
		
		// フォーム値をクリアする
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_BLOG_ARTICLE_EDIT_DONE);
		return 'admin_blog_article_list';
	}
}
?>