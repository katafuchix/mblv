<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã������ǧ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendApplyConfirm extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDEN�ե����������
		$hidden_vars = $this->af->getHiddenVars(null,array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// ������桼��������������
		$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>
