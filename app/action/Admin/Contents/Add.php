<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������ƥ����Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Add/Do.php';
class Tv_Form_AdminContentsAdd extends Tv_Form_AdminContentsAddDo
{
}

/**
 * ��������ƥ����Ͽ���������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminContentsAdd extends Tv_ActionAdminOnly
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
		return 'admin_contents_add';
	}
}
?>