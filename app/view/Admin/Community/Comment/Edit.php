<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ߥ�˥ƥ��������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityCommentEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		//��������μ���
		$articleObject =& new Tv_CommunityComment($this->backend,'community_comment_id',$this->af->get('community_comment_id'));
		$articleObject->exportForm();
	}
}
?>