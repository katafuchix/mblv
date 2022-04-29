<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記登録アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		'twitter_status' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザ日記登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		// ナパボードの場合はタイトルを必須としない
		if($this->af->get('twitter_status')){
			$this->af->form['blog_article_body']['required'] = false;
			$this->af->set('blog_article_public',1);
			// 絵文字を考慮する
			$max_len = 140;
			if(preg_match_all( '/\[x:(\d{4})\]/', $this->af->get('blog_article_title'), $match )){
				// 絵文字検索格納用の配列を初期化する
				$match = array();
				// 絵文字を一時置換する文字列
				$_tmp = '○';
				// 絵文字を正規表現で一時文字列に置換する
				$_replace_str =  preg_replace( '/\[x:(\d{4})\]/', $_tmp, $this->af->get('blog_article_title') );
				// 絵文字も入れて全角７０文字以上はエラーとする
				if(strlen($_replace_str) > $max_len){
					$this->ae->add('errors', '全角７０文字以内でご入力ください');
					return 'user_twitter';
				}
			}else{
				$this->af->form['blog_article_title']['max'] = $max_len;		// 全角140
			}
			$this->af->form['blog_article_title']['name'] = '投稿';
		}
		
		// 戻るボタン
		if($this->af->get('back')) return 'user_blog_article_add';
		
		// 検証エラー
		if($this->af->validate() > 0){
			if($this->af->get('twitter_status')){
				return 'user_twitter';
			}
			return 'user_blog_article_add';
		}
		
		// 二重投稿エラー
		if (Ethna_Util::isDuplicatePost()) {
			if($this->af->get('twitter_status')){
				//$this->ae->add(null, '', E_USER_DUPLICATE_POST);
				$this->af->set('blog_article_title','');
				return 'user_twitter';
			}
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
		
		// ナパボードの書き込み
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_add_done';
	}
}
?>
