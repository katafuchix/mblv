<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������ܺ٥��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcUserorderDetail extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_order_id' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'cart_hash' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * �������������ܺ٥��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcUserorderDetail extends Tv_ActionAdminOnly
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
		$o = & new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		$o->exportForm();
		
		return 'admin_ec_userorder_detail';
	}
}
?>