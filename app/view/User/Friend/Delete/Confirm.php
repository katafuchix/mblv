<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ͧã��󥯲����ǧ���̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �����桼���ξ������
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$this->af->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>