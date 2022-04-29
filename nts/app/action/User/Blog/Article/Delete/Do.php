<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogArticleDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_article_id' => array(
			'required'  => true,
		),
		'blog_article_title' => array(
		),
		'blog_article_body' => array(
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
		'twitter_status' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザ日記削除実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleDeleteDo extends Tv_ActionUserOnly
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
		// 日記オブジェクトを取得する
		$article =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		
		// 日記が存在しない場合はエラーを出す
		if( !$article->isValid() || $article->get('blog_article_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		// 「いいえ」が押されたならば戻る
		if( $this->af->get('back') ) {
			return 'user_blog_article_view';
		}
		
		// 論理削除
		$article->delete();
		
		// ナパボードの書き込み
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_delete_done';
	}
}

?>
