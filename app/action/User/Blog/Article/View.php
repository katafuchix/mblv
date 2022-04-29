<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������������ե�����
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
 * �桼�������������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleView extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
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
		// ��ʬ�������ξ��Τ�����������̤�ɥե饰�򹹿�����
		if( $user_session['user_id'] == $article->get('user_id') ){
			$article->set('blog_article_notice', 0);
		}
		$article->update();
		
		switch($article->get('blog_article_public'))
		{
		case 0:	// �����
			if($article->get('user_id') != $user_session['user_id']){
				$this->ae->add(null, '', E_USER_BLOG_ARTICLE_ACCESS_DENIED);
				return 'user_error';
			}
			break;
		case 2: // ͧã�ޤǸ���
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
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_blog_article_view';
	}
}
?>