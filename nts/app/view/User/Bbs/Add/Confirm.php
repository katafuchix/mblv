<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �桼��������Ͽ��ǧ���̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBbsAddConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե���������
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'send', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// ������桼���������
		$toUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
	}
}
?>