<?php
/**
 * Remind.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ѥ���ɥ�ޥ���������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserRemind extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼���ѥ���ɥ�ޥ���������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRemind extends Tv_ActionUser
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
		return 'user_remind';
	}
}

?>
