<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����������Խ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommentEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		//��������μ���
		$articleObject =& new Tv_Comment($this->backend,'comment_id',$this->af->get('comment_id'));
		$articleObject->exportForm();
	}
}
?>
