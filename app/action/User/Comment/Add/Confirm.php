<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����������Ͽ��ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommentAddConfirm extends Tv_Form_UserCommentAddDo
{
}

/**
 * �桼����������Ͽ��ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ToDo:������׸�Ƥ
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_error';
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
		// HIDDEN�ե������View����������
		return 'user_comment_add_confirm';
	}
}
?>