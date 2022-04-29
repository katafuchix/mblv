<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
	);
}

/**
 * �桼�������Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlogArticleEditDo extends Tv_ActionUserOnly
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
		if($this->af->get('back')) return 'user_blog_article_edit';
		
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_blog_article_edit';
		
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
		// �������֥������Ȥ򹹿�
		$article =& new Tv_BlogArticle($this->backend, 'blog_article_id', $this->af->get('blog_article_id'));
		$article->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ��������
		if($this->af->get('delete_image')){
			$article->deleteImage();
		}
		// �����С��饤��
		$article->update();
		
		return 'user_blog_article_edit_done';
	}
}
?>