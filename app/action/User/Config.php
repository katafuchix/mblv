<?php
/**
 * Config.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ꥢ�������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */class Tv_Form_UserConfig extends Tv_ActionForm
{
}

/**
 * �桼�����ꥢ�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfig extends Tv_ActionUserOnly
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
		return 'user_config';
	}
}
?>