<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����������Ⱥ����ǧ���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogCommentDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���������ȥ��֥������Ȥ��������
		$comment =& new Tv_BlogComment($this->backend,'blog_comment_id',$this->af->get('blog_comment_id'));
		$comment->exportform();
	}
}
?>