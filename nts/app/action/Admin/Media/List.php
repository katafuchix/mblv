<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ������ǥ����������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminMediaList extends Tv_ActionForm
{
}

/**
 * ������ǥ����������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminMediaList extends Tv_ActionAdminOnly
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
		return 'admin_media_list';
	}
}
?>