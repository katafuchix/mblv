<?php
/**
 * Send.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ��å������������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserMessageSend extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������桼���������
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$this->af->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}

?>
