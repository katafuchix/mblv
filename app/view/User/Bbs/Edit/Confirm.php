<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Խ���ǧ���̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBbsEditConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// HIDDEN�ե����������
		$hidden_vars = $this->af->getHiddenVars(null, array('delete_image', 'confirm', 'back', 'update'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// ������桼���������
		$toUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
	}
}
?>