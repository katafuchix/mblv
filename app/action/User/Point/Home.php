<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ݥ������Ģ�ۡ��ॢ�������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointHome extends Tv_ActionForm
{
}

/**
 * �桼���ݥ������Ģ�ۡ��ॢ�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointHome extends Tv_ActionUserOnly
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
		return 'user_point_home';
	}
}
?>