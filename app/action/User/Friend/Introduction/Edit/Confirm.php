<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã�Ҳ�ʸ�Խ���ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserFriendIntroductionEditConfirm extends Tv_Form_UserFriendIntroductionEditDo
{
}

/**
 * �桼��ͧã�Ҳ�ʸ�Խ���ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendIntroductionEditConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0){
			return 'user_friend_introduction_edit';
		}
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
		// HIDDEN�ե������View������
		return 'user_friend_introduction_edit_confirm';
	}
}
?>