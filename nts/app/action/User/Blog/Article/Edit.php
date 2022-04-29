<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogArticleEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザ日記編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleEdit extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_blog_article_view';
		
		// 記事が存在しない場合の処理 start
		$article =& new Tv_BlogArticle(
			$this->backend,
			'blog_article_id',
			$this->af->get('blog_article_id')
		);
		if( !$article->isValid() ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		// 記事が存在しない場合の処理 end
		
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
		// 日記オブジェクトを取得
		$article =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$article->exportForm();
		
		return 'user_blog_article_edit';
	}
}

?>
