<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������Ⱥ����ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommentDeleteConfirm extends Tv_Form_UserCommentDeleteDo
{
}

/**
 * �桼�������Ⱥ����ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentDeleteConfirm extends Tv_ActionUserOnly
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
		// ToDo:������׸�Ƥ
		if($this->af->validate() > 0) return 'user_home';
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
		// ���֥������Ȥ��������
		$o =& new Tv_Comment($this->backend,'comment_id',$this->af->get('comment_id'));
		$o->exportForm();
		
		return 'user_comment_delete_confirm';
	}
}
?>