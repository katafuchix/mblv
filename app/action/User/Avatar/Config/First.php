<?php
/**
 * First.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х�������ڡ���1���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarConfigFirst extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * �桼�����Х�������ڡ���1���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarConfigFirst extends Tv_ActionUserOnly
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
		return 'user_avatar_config_first';
	}
}
?>