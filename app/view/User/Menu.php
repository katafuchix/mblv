<?php
/**
 * Menu.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��˥塼���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserMenu extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$db	=& $this->backend->getDB();
		$um = $this->backend->getManager('Util');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
	}
}
?>