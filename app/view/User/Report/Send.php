<?php
/**
 * Send.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����å������������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserReportSend extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ������桼���������
		$to_user = &new Tv_User($this->backend, array('user_id'), $this->af->get('report_fail_user_id'));
		$this->af->setApp('report_fail_user', $to_user->getNameObject());
	}
}
?>