<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �����ۡ�����̥��������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminHome extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
	);
}

/**
 * �����ۡ�����̥��������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminHome extends Tv_ActionAdminOnly
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
		return 'admin_home';
	}
}
?>