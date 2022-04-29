<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������Ͽ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
	);
}

/**
 * �桼��������Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ܥ���
		if($this->af->get('back')) return 'user_blog_article_add';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_blog_article_add';
		
		// �����ƥ��顼
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_blog_article_add';
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
		// �����������֥��������ɲ�
		$article =& new Tv_BlogArticle($this->backend);
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �����С��饤��
		$r = $article->add();
		if(Ethna::isError($r)) return 'user_blog_article_add';
		
		// ��������ID�򥻥å�
		$this->af->setApp('blog_article_id', $article->getId());
		// ���������ϥå���򥻥å�
		$this->af->setApp('blog_article_hash', $article->get('blog_article_hash'));
		
		return 'user_blog_article_add_done';
	}
}
?>