<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã�Ҳ�ʸ�����ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserFriendIntroductionDeleteConfirm extends Tv_Form_UserFriendIntroductionDeleteDo
{
}

/**
 * �桼��ͧã�Ҳ�ʸ�����ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendIntroductionDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		return 'user_friend_introduction_delete_confirm';
	}
}

?>
