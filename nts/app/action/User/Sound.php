<?php
/**
 * Sound.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������ɥݡ����륢�������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserSound extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼��������ɥݡ����륢�������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */class Tv_Action_UserSound extends Tv_ActionUserOnly
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
		return 'user_sound';
	}
}
?>