<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �����å������������Ƴ�ǧ���̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserReportSendConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$hiddenVars = $this->af->getHiddenVars(
			null,
			array('confirm', 'send', 'back')
			);
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// ������桼���������
		$failUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('report_fail_user_id'));
		$this->af->setApp('report_fail_user', $failUser->getNameObject());
	}
}
?>