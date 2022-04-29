<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե���������ǧ���������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_AdminFileRemoveConfirm extends Tv_Form_AdminFileRemoveDo
{
}

/**
 * �����ե���������ǧ���������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFileRemoveConfirm extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate()) {
			return 'admin_file_search_result';
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
		return 'admin_file_remove_confirm';
	}
}
?>