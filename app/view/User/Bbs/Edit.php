<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Խ����̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBbsEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$comment =& new Tv_Bbs(
			$this->backend,
			'bbs_id',
			$this->af->get('bbs_id')
		);
		
		// ������桼���������
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$comment->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>