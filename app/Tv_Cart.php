<?php
/**
 * Tv_Cart.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ȥޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CartManager extends Ethna_AppManager
{
	/**
	 * �㤤ʪ��������Ȥ��֤�
	 * 
	 * @param  $cart_hash�ʥ����ȥϥå����,$cart_status�ʥ����ȥ��ơ�������,$stock�ʺ߸˥ơ��֥�ޤǼ����оݤȤ��뤫�ɤ�����
	 * @access public
	 * @return array $cart_list���㤤ʪ��������������
	 */
	function getCartList($cart_hash, $cart_status='0,1,2', $stock=true)
	{
		// �����[cart_staus]�˱������㤤ʪ�������ơ����������ꤹ��
		$c = explode(',', $cart_status);
		// �ͤλ��꤬1�Ĥξ��
		if(count($c) == 1){
			$cart_status_phrase = "= {$c[0]}";
		}
		// �ͤλ��꤬ʣ���ξ��
		else{
			$cart_status_phrase = "in ({$cart_status})";
		}
		
		// ��������From��
		$sqlFrom = 'cart as c,item as i';
		if($stock) $sqlFrom .= ',stock as s';
		// ��������Where��
		$sqlWhere = "c.cart_hash = ? AND c.cart_status {$cart_status_phrase} AND c.item_id = i.item_id";
		if($stock) $sqlWhere .=  ' AND c.stock_id = s.stock_id';
		// ��������Values��
		$sqlValues = array($cart_hash);
		
		// �㤤ʪ��������Ȥ��������
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> $sqlFrom,
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		$um = $this->backend->getManager('Util');
		$r =  $um->dataQuery($param);
		// �����ꥨ�顼�ξ��
		if(Ethna::isError($r)) return array();
		
		$cart_list = $r;
		// �㤤ʪ��������Ȥ��ʤ����
		if(count($rows) == 0) return $r;
		
		$cart_list = $rows;
		// ���٤Ƥ��㤤ʪ��������Ȥ��Ф��ƽ�����Ԥ�
		foreach($cart_list as $k => $v){
			$true_item_price = floor($v['item_price']/21)*20;
			$cart_list[$k]['item_point'] = floor($true_item_price * $v['item_num'] * $v['item_point_ratio'] / 100);
		}
		return $cart_list;
	}
	
	/**
	 * �㤤ʪ��������Ȥι�׶��(�ǹ�)���֤�
	 *
	 * @param  $cart������ξ����㤤ʪ��������ȡ������顼�ξ��ϥ����ȥϥå����
	 * @access public
	 * @return integer $total_price
	 */
	function getTotalPriceTaxin($cart)
	{
		// ����ξ�硢�㤤ʪ�������������
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// ����¾�ξ��ϡ������ȥϥå���
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		// �㤤ʪ��׶�ۤη׻�
		$total_price = 0;
		foreach($cart_list as $k => $v){
			// ���̤ξ��ʶ�ۡ߾��ʸĿ�
			$total_price += $v['item_price'] * $v['cart_item_num'];
		}
		return $total_price;
	}
	
	/**
	 * �㤤ʪ��������Ȥι�׶��(��ȴ)���֤�
	 *
	 * @param  $cart������ξ����㤤ʪ��������ȡ������顼�ξ��ϥ����ȥϥå����
	 * @access public
	 * @return integer $total_price
	 */
	function getTotalPriceTaxout($cart)
	{
		// ����ξ�硢�㤤ʪ�������������
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// ����¾�ξ��ϡ������ȥϥå���
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		// �㤤ʪ��׶�ۤη׻�
		$total_price = 0;
		foreach($cart_list as $k => $v){
			// ���̤��ǰ������ʶ�ۡ߾��ʸĿ�
			$true_item_price = floor($v['item_price']/21)*20;
			$total_price += $true_item_price * $v['cart_item_num'];
		}
		return $total_price;
	}
	
	/**
	 * ��ʧ����ǽ����ʸ��ˡ�������������
	 *
	 * @param  $cart������ξ����㤤ʪ��������ȡ������顼�ξ��ϥ����ȥϥå����
	 * @access public
	 * @return array $order_type_list
	 */
	function getOrderTypeList($cart)
	{
		// ����ξ�硢�㤤ʪ�������������
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// ����¾�ξ��ϡ������ȥϥå���
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		
		// ����ʧ����ˡ������
		$order_type_list = $this->config->get('user_order_type');
		
		// �����ʤ����ӽ�
		unset($order_type_list['']);
		
		// ���ѤǤ��ʤ���ʧ��ˡ�����ʻ���λ�ʧ����ˡ���Բ�ǽ�ʾ�硢���λ�ʧ����ˡ�Ͻ���������
		foreach($cart_list as $k => $v){
			// ���쥸�åȤ��Բ�ǽ�ʾ��
			if(!$v['item_use_credit_status'])  unset($order_type_list[1]);
			// ����ӥˤ��Բ�ǽ�ʾ��
			if(!$v['item_use_conveni_status']) unset($order_type_list[2]);
			// ��������Բ�ǽ�ʾ��
			if(!$v['item_use_exchange_status']) unset($order_type_list[3]);
			// ��Կ�����ߤ��Բ�ǽ�ʾ��
			if(!$v['item_use_transfer_status']) unset($order_type_list[4]);
		}
		
		return $order_type_list;
	}
}

/**
 * �����ȥ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cart extends Ethna_AppObject
{
}
?>