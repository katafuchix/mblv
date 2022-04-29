<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBlogArticleEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'blog_article_id' => array(
		),
		'blog_article_title' => array(
		),
		'blog_article_body' => array(
		),
		'blog_article_public' => array(
			'required'		=> true,
		),
		'delete_image' => array(
		),
	);
}

/**
 * ���������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBlogArticleEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'admin_blog_article_edit';
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
		// �����Խ�
		$o =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// �����С��饤��
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_article_edit';
		
		// �ե������ͤ򥯥ꥢ����
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_BLOG_ARTICLE_EDIT_DONE);
		return 'admin_blog_article_list';
	}
}
?>