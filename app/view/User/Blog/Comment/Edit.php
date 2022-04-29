<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogCommentEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �����Ȥ����
		$comment =& new Tv_BlogComment(
			$this->backend,
			'blog_comment_id',
			$this->af->get('blog_comment_id')
		);
		
		// �����ȤΥ����å�
		if( $comment->isValid() && $comment->get('blog_comment_status') == 1 ) {
			// �����Ȥ�¸�ߤ�����
			$this->af->setApp('comment', $comment->getNameObject());
		} else {
			// �����Ȥ�¸�ߤ��ʤ����
			$this->ae->add(null, '', E_USER_BLOG_COMMENT_NOT_FOUND);
		}
	}
}
?>