<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������𥫥ƥ�����Ͽ���������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Add/Do.php';
class Tv_Form_AdminAdcategoryAdd extends Tv_Form_AdminAdcategoryAddDo
{
}

/**
 * �������𥫥ƥ�����Ͽ���������¹ԥ��饹
 * 
 * ���𥫥ƥ�����Ͽ�ե�������̤�ɽ�����ޤ�
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcategoryAdd extends Tv_ActionAdminOnly
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
		return 'admin_adcategory_add';
	}
}
?>