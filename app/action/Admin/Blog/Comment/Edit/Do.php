<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������������Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBlogCommentEditDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'blog_comment_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'blog_comment_body' => array(
		),
		'delete_image' => array(
		),
	);
}

/**
 * ���������������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminBlogCommentEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_blog_comment_edit';
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
		$o =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������
		if($this->af->get('delete_image')){
			$o->deleteImage();
		}
		// �����С��饤��
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_comment_edit';
		
		// �ե������ͤ򥯥ꥢ����
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_BLOG_COMMENT_EDIT_DONE);
		return 'admin_blog_comment_list';
	}
}
?>