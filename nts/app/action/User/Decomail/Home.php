<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ǥ��᡼��ۡ��ॢ�������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserDecomailHome extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼���ǥ��᡼��ۡ��ॢ�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserDecomailHome extends Tv_ActionUserOnly
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
		return 'user_decomail_home';
	}
}

?>
