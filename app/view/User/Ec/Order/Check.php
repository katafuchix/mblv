<?php
/**
 * Check.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʸ���Ƴ�ǧ���̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcOrderCheck extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ����
		$cart_hash = $this->session->get('cart_hash');
		$usersess = $this->session->get('user');
		$user_id = $usersess['user_id'];
		
		// �桼������μ���
		$u = new Tv_User($this->backend, 'user_id', $user_id);
		$u->exportform();
		
		/*
		 * �㤤ʪ��������Ȥμ���
		 */
		$sqlWhere = "c.cart_hash = ? ".
				" AND c.stock_id = s.stock_id ".
				" AND s.item_id = i.item_id ".
				" AND c.cart_status = 0";
		
		$param = array(
			'sql_select'	=> '*',
			'sql_values'	=> array($cart_hash),
			'sql_from'		=> 'cart c,item i,stock s',
			'sql_where'		=> $sqlWhere
		);
		
		$cart_list = $um->dataQuery($param);
		$this->af->setApp("cart_list", $cart_list);
			
		// �㤤ʪ��׶�ۤν����
		$user_order_total_price1 = 0;
		// �����ݥ���Ȥν����
		$user_order_get_point = 0;
		// �㤤ʪ������׾��ʸĿ��ν����
		$total_num = 0;
		// ���٤Ƥ��㤤ʪ�����쥳���ɤ��Ф��ƽ�������
		foreach($cart_list as $k => $v){
			// �㤤ʪ�����쥳���ɤξ��פ�׻�����
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// ������ȴ���ι�׶�ۤ�û�����
			$user_order_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// ��׾��ʸĿ���û�����
			$total_num += $v['cart_item_num'];
			// �ݥ���ȷ׻�
			$user_order_get_point += $v['item_point'] * $v['cart_item_num'];
			// ȯ��ñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			//$unit_item_detail[$v['item_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			//$unit_item_detail[$v['item_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ���ȥå��ʥ����ס�IDñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
		}
		// ��׶��
		$this->af->setApp("user_order_total_price1",$user_order_total_price1);
		// ��׼����ݥ����
		$this->af->setApp("user_order_get_point",$user_order_get_point);
		
		/*
		 * �����Ǥη׻�
		 */
		$user_order_tax = floor($user_order_total_price1/21);
		$this->af->setApp("user_order_tax",$user_order_tax);
		
		/*
		 * ����
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����
		 */
		$user_order_postage = 0;
		// �����桼������ƻ�ܸ�
		$pref = $u->get('region_id');
		// ����¾����������ξ��ϡ����������ƻ�ܸ��˾��
		if($this->af->get('user_order_delivery_type') == 2) $pref = $this->af->get('user_order_delivery_region_id');
		// ���������
		if(!$cart_list) return 'user_error';
		$user_order_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail ,$pref);
		$this->af->setApp("user_order_postage",$user_order_postage);
		
		/*
		 * ����������
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����������
		 */
		$user_order_exchange_fee = 0;
		if($this->af->get('user_order_type')==3){
			if(!$cart_list) return 'user_error';
			$user_order_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$this->af->setApp("user_order_exchange_fee",$user_order_exchange_fee);
		
		/*
		 * �ݥ���ȷ׻�
		 */
		$user_order_expend_point = 0;
		if($this->af->get('user_order_use_point_status') == 1){
			$user_order_expend_point = $this->af->get('user_order_use_point');
		}
		// ���ʾ��� < ���Ѥ���ݥ���Ȥξ���Ĵ��
		if($user_order_total_price1 < $user_order_expend_point){
			$user_order_expend_point = $user_order_total_price1;
		}
		$this->af->setApp('user_order_expend_point', $user_order_expend_point);
		
		/*
		 * ��׶��
		 */
		$user_order_total_price2 = $user_order_total_price1 - $user_order_expend_point + $user_order_postage + $user_order_exchange_fee;
		$this->af->setApp("user_order_total_price2",$user_order_total_price2);
		
		// �ݥ��Ȥ��줿�ǡ�����HIDDEN�ե�����Ȥ��ư����Ѥ�
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>