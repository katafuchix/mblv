<?php
/**
 * Exchange.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * �ݥ���ȸ򴹿������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointExchange extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access	public
	 */
	function preforward()
	{ 
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user'); 
		// ���ߤΥݥ���Ȥ����
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$this->af->setApp('user', $o->getNameObject());
	}
}

?>
