<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記コメント登録実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
			'required'  => true,
		),
		'blog_article_id' => array(
			'required'  => true,
		),
		'blog_comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
		),
		'twitter_status' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ日記コメント登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */class Tv_Action_UserBlogCommentAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// ナパボードの場合はコメントのmaxを全角500文字にする
		if($this->af->get('twitter_status')){
			$this->af->form['blog_comment_body']['max'] = 1024;
		}
		
		// 戻るボタン、検証エラー
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			return 'user_blog_article_view';
		}
		
		// 二重投稿エラー
		if (Ethna_Util::isDuplicatePost()) {
			// ナパボードのリロード
			if($this->af->get('twitter_status')){
				$this->af->set('blog_comment_body','');
			}else{
				$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			}
			return 'user_blog_article_view';
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
		$timestamp = date('Y-m-d H:i:s');
		// 日記記事オブジェクトを取得する
		$article =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		// 記事が存在しない場合はエラー
		if( !$article->isValid() || $article->get('blog_article_status') == 0 ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		switch($article->get('blog_article_public'))
		{
		case 0:	// 非公開
			if($article->get('user_id') != $user_session['user_id']){
				$this->ae->add(null, '', E_USER_BLOG_ARTICLE_ACCESS_DENIED);
				return 'user_error';
			}
			break;
		case 2: // 友達まで公開
			if(!$um->getUserRelation($article->get('user_id'), $user_session['user_id']))
			{
				$this->ae->add(null, '', E_USER_BLOG_ARTICLE_ACCESS_DENIED);
				return 'user_error';
			}
			break;
		}
		
		// 日記コメントオブジェクトを追加
		$comment =& new Tv_BlogComment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 未読フラグ
		$comment->set('blog_comment_notice', 1);
		// オーバーライド
		$r = $comment->add();
		if(Ethna::isError($r)) return 'user_blog_article_view';
		
		// 日記コメント識別子をセット
		$this->af->setApp('blog_comment_hash',$comment->get('blog_comment_hash'));
		
		// 記事オブジェクトを更新
		$article->set('blog_article_comment_num', $article->get('blog_article_comment_num') + 1);
		$article->set('blog_article_comment_time', $timestamp);
		// 自分の日記ではない場合のみ日記コメント未読フラグを更新
		if( $user_session['user_id'] != $article->get('user_id') ){
			$article->set('blog_article_notice', 1);
		}
		$article->update();
		
		// ナパボード
		if($article->get('twitter_status')){
			$this->af->set('blog_comment_body','');
			return 'user_blog_article_view';
		}
		
		return 'user_blog_comment_add_done';
	}
}
?>
