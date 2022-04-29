<?php
/**
 * Type.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʧ��ˡ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcOrderType extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// �桼������μ���
		$userSess = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $userSess['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// �㤤ʪ��������Ȥ������̤��ѥ��ơ������Τ�ΤΤߡ��߸˥ơ��֥����ޤǤϼ������ʤ���
		$cart = $this->backend->getManager('Cart');
		$cart_list = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// �㤤ʪ��������Ⱦ��ʹ�׶���ǹ��μ���->���å�
		$this->af->setApp('total_price', $cart->getTotalPriceTaxin($cart_list));
		// �㤤ʪ��������Ⱦ��ʹ�׶���ǹ��μ���->���å�
		$this->af->setApp('total_price_taxout', $cart->getTotalPriceTaxout($cart_list));
		
		// ���Ѳ�ǽ�ʻ�ʧ����ˡ�����ꤷ�Ƥ��ʤ����
		if(!is_array($this->af->get('order_type_list'))){
			//��ʧ����ˡ�򥻥å�
			$this->af->setApp('order_type_list',$cart->getOrderTypeList($cart_list));
		}
	}
}
?>