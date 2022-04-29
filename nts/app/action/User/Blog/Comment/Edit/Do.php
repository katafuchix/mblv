<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記コメント編集実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserBlogCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_comment_id' => array(
			'required'	=> true,
		),
		'blog_comment_body' => array(
			'required'	=> true,
		),
		'blog_comment_hash' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'submit' => array(
		),
		'back' => array(
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
		'twitter_status' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ日記コメント編集実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogCommentEditDo extends Tv_ActionUserOnly
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
		
		// 画像を削除
		if($this->af->get('delete_image')){
			$comment =& new Tv_BlogComment(
				$this->backend,
				'blog_comment_id',
				$this->af->get('blog_comment_id')
			);
			if($comment->isValid()) $comment->deleteImage();
			return 'user_blog_comment_edit';
		}
		if( $this->af->validate() > 0 ) {
			return 'user_blog_comment_edit';
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
		// 日記コメントオブジェクトの取得
		$comment =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		
		// オブジェクトが無効であるかコメントが削除されているとき
		if( !$comment->isValid() || $comment->get('blog_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// 次のアクションに渡す引数
		$this->af->set( 'blog_article_id', $comment->get('blog_article_id') );
		
		// 「いいえ」を押したなら日記に戻る
		if( $this->af->get('back') ) {
			return 'user_blog_comment_edit';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		// 記事が存在しない場合はエラーを出す start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $comment->get('blog_article_id'), 1 )
		);
		if( !$article->isValid() ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		// 記事が存在しない場合はエラーを出す end
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
		
		// 日記コメントの編集
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$comment->update();
		if(Ethna::isError($r)) return 'user_blog_article_view';
		
		$this->af->setApp('blog_comment_hash', $comment->get('blog_comment_hash'));
		
		// ナパボード
		if($article->get('twitter_status')){
			$this->af->set('blog_comment_body','');
			return 'user_blog_article_view';
		}
		
		return 'user_blog_comment_edit_done';
	}
}

?>
