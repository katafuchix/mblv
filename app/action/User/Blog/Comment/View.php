<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記コメント閲覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogCommentView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'blog_article_id' => array(
			'required'	=> true,
		),
		'user_id'	=> array(
			'type'		=> VAR_TYPE_INT,
		),
		'page' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザ日記コメント閲覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogCommentView extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
		
		$user_session = $this->session->get('user');
		
		// 記事が存在しない場合はエラーを出す start
		$article =& new Tv_BlogArticle(
			$this->backend,
			array( 'blog_article_id', 'blog_article_status' ),
			array( $this->af->get('blog_article_id'), 1 )
		);
		if( !$article->isValid() ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		// 記事が存在しない場合はエラーを出す end
		switch((integer)$article->get('blog_article_public'))
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
		return 'user_blog_comment_view';
	}
}
?>