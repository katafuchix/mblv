<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼����������¹ԥ��������ե�����
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
 * �桼����������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlogArticleDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_blog_article_view';
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
		// �������֥������Ȥ��������
		$article =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		
		// ������¸�ߤ��ʤ����ϥ��顼��Ф�
		if( !$article->isValid() || $article->get('blog_article_status') != 1 ) {
			$this->ae->add(null, '', E_USER_BLOG_ARTICLE_NOT_FOUND);
			return 'user_error';
		}
		
		// �֤������פ������줿�ʤ�����
		if( $this->af->get('back') ) {
			return 'user_blog_article_view';
		}
		
		// �������
		$article->delete();
		
		// �ʥѥܡ��ɤν񤭹���
		if($article->get('twitter_status')){
			$this->af->clearFormVars();
			return 'user_twitter';
		}
		
		return 'user_blog_article_delete_done';
	}
}

?>
