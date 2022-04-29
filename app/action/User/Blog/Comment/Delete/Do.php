<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記コメント削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'blog_comment_id' => array(
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
		'delete_confirm' => array(
		),
	);
}
/**
 * ユーザ日記コメント削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentDeleteDo extends Tv_ActionUserOnly
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
		if( $this->af->validate() > 0 ) return 'user_home';
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
		
		// コメントが存在しない場合はエラーを出す
		if( !$comment->isValid() || $comment->get('blog_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// フォームに値を渡す
		$this->af->set( 'blog_article_id', $comment->get('blog_article_id') );
		
		// 「いいえ」が押されたならば戻る
		if( $this->af->get('back') ) {
			return 'user_blog_article_view';
		}
		
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		// 記事が存在しない場合はエラーを出す start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $comment->get('blog_article_id'), 1)
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
		
		// コメントを論理削除
		$comment->set('comment_status', 0);
		$comment->set('comment_deleted_time', date('YmdHis'));
		$comment->update();

		// 日記コメントを論理削除
		// オーバーライド
		// 日記オブジェクトのコメント数も自動減算
		$comment->delete();
		
		return 'user_blog_comment_delete_done';
	}
}
?>