<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �桼�����������ǧ���̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBbsDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���֥������Ȥ����
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		$message->exportform();
	}
}
?>