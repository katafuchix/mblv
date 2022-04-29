<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���֥�å��ꥹ����Ͽ��ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'action/User/Blacklist/Add/Do.php';
class Tv_Form_UserBlacklistAddConfirm extends Tv_Form_UserBlacklistAddDo
{
}

/**
 * �桼���֥�å��ꥹ����Ͽ��ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlacklistAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_blacklist_add';
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'submit', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		return 'user_blacklist_add_confirm';
	}
}
?>