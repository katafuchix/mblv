<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogArticleEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_id' => array(
			'required'  => true,
		),
		'blog_article_title' => array(
			'required'		=> true,
		),
		'blog_article_body' => array(
			'required'		=> true,
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'blog_article_hash' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete_image' => array(
		),
		'edit_confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
	);
}

/**
 * ユーザ日記編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleEditDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_blog_article_edit';
		
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
		// 日記オブジェクトを更新
		$article =& new Tv_BlogArticle($this->backend, 'blog_article_id', $this->af->get('blog_article_id'));
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像を削除
		if($this->af->get('delete_image')){
			$article->deleteImage();
		}
		// オーバーライド
		$article->update();
		
		return 'user_blog_article_edit_done';
	}
}
?>