<?php

/**
 * Type.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʧ�������򥢥������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UesrEcOrderType extends Tv_ActionForm
{
}

/**
 * ��ʧ�������򥢥������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UesrEcOrderType extends Tv_ActionUserOnly
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
		// �����ȥϥå���򸵤��㤤ʪ����������ʤκ߸ˤ��ǧ����
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�)
		// �߸˥ơ��֥�Ϸ�礷�ʤ�
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// �㤤ʪ��������˾��ʤ��ʤ����
		if(count($r) == 0){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		return 'user_ec_order_type';
	}
}
?>