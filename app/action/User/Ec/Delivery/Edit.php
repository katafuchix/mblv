<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������Խ����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */

class Tv_Form_UserEcDeliveryEdit extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
	);
}

/**
 * �桼���������Խ����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcDeliveryEdit extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$usersess = $this->session->get('user');
		if(!$usersess) return 'user_index';
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
		return 'user_ec_delivery_edit';
	}
}
?>