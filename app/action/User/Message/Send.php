<?php
/**
 * Send.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼����å������������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserMessageSend extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
	);
}

/**
 * �桼����å������������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageSend extends Tv_ActionUserOnly
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
		return 'user_message_send';
	}
}
?>