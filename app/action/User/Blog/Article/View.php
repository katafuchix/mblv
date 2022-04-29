<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記閲覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlogArticleView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'blog_article_id' => array(
			'required'	=> true,
		),
		'page' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}
/**
 * ユーザ日記閲覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleView extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$user_session = $this->session->get('user');
		$um =& $this->backend->getManager('user');
		
		if($this->af->validate() > 0)
		{
			return 'user_error';
		}
		
		$article =& new Tv_BlogArticle(
			$this->backend,
			'blog_article_id',
			$this->af->get('blog_article_id')
		);
		// 自分の日記の場合のみ日記コメント未読フラグを更新する
		if( $user_session['user_id'] == $article->get('user_id') ){
			$article->set('blog_article_notice', 0);
		}
		$article->update();
		
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
		return 'user_blog_article_view';
	}
}
?>