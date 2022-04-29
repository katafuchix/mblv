<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記編集実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		'twitter_status' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザ日記編集実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		// ナパボードの場合はタイトルを必須としない
		if($this->af->get('twitter_status')){
			$this->af->form['blog_article_body']['required'] = false;
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
			$this->af->form['blog_article_public']['required'] = false;
		}
		
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
		
		// ナパボードの書き込み
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_edit_done';
	}
}

?>
