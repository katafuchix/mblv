<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommentEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		$this->af->setApp('comment', $comment->getNameObject());
	}
}
?>