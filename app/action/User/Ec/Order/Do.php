<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʸ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		// ���ܥѥ�᡼��
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point_status' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type'        => VAR_TYPE_INT,
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		//��ã���ֻ���
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> 'Util, delivery_date',
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// �����ɥѥ�᡼��
		'user_order_card_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_number' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_month' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_year' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// ����ӥ˥ѥ�᡼��
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// ������ѥ�᡼��
		// ����ѥ�᡼��
		'user_order_delivery_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_name_kana' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_zipcode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_region_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * ��ʸ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderDo extends Tv_ActionUserOnly
{
	/** @var    object    UtilManager���֥������� */
	var $um;
	/** @var    object    �⡼����󥪥֥������� */
	var $mall;
	/** @var    object    ����å׾��󥪥֥������� */
	var $shop;
	/** @var    object    �桼�����󥪥֥������� */
	var $user;
	/** @var    array     �㤤ʪ������������� */
	var $cart_list;
	/** @var    array     ��ʸ�������� */
	var $order;
	/** @var    array     ������������� */
	var $delivery;
	/** @var    string    �������ѤΥƥ����� */
	var $log_body;
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ��ťݥ����б�
		if(Ethna_Util::isDuplicatePost()) return 'user_ec_order_done'; 
		
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
		// �桼�ƥ���ޥ͡�����򥻥å�
		$this->um = $this->backend->getManager('Util');
		// �⡼����ܾ���򥻥å�
		$this->mall =& new Tv_Config($this->backend, 'config_type', 'mall');
		// �桼������򥻥å�
		$userSess = $this->session->get('user');
		$this->user =& new Tv_User($this->backend, 'user_id', $userSess['user_id']);
		
		// �㤤ʪ��������Ȥ򥻥åȡ�[$this->cart_list]���㤤ʪ��������Ȥ����åȤ���ޤ�����
		$return = $this->_setCartList();
		if($return) return $return;
		// �߸ˤγ�ǧ
		$return = $this->_checkStock();
		if($return) return $return;
		
		// ������
		$this->log_body .= "start {date('Y-m-d H:i:s')}\n";
		$this->log_body .= "cart_hash             = {$this->session->get('cart_hash')}\n";
		$this->log_body .= "user_name             = {$this->user->get('user_name')}\n";
		$this->log_body .= "user_mailaddress      = {$this->user->get('user_mailaddress')}\n";
		$this->log_body .= "user_zipcode          = {$this->user->get('user_zipcode')}\n";
		$this->log_body .= "region_id             = {$this->user->get('region_id')}\n";
		$this->log_body .= "user_address          = {$this->user->get('user_address')}\n";
		$this->log_body .= "user_address_building = {$this->user->get('user_address_building')}\n";
		$this->log_body .= "user_phone            = {$this->user->get('user_phone')}\n";
		$this->log_body .= "user_point            = {$this->user->get('user_point')}\n";
		
		// ��ʧ����ۤ򥻥å�
		$return = $this->_setPayment();
		if($return) return $return;
		
		//�����Ⱦ��ֽ����
		$this->cart_status = 0;
		
		// ������
		$this->log_body .= "user_order_total_price1     = {$this->order['total_price1']}\n";
		$this->log_body .= "total_num                   = {$total_num}\n";
		$this->log_body .= "user_order_tax              = {$this->order['tax']}\n";
		$this->log_body .= "pastage                     = {$this->order['postage']}\n";
		$this->log_body .= "user_order_exchange_fee     = {$this->order['exchange_fee']}\n";
		$this->log_body .= "user_order_get_point        = {$this->order['get_point']}\n";
		$this->log_body .= "user_order_use_point_status = {$this->order['use_point_status']}\n";
		$this->log_body .= "user_order_expend_point     = {$this->order['expend_point']}\n";
		$this->log_body .= "user_order_total_price2     = {$this->order['total_price2']}\n";
		
		// ��ʧ�������¹�
		$return = $this->_payment();
		if($return) return $return;
		// �㤤ʪ�����������ʸ�Ѥߤ˹���
		$return = $this->_updateCart();
		if($return) return $return;
		// ��ʸ
		$return = $this->_order();
		if($return) return $return;
		// �ݥ���ȸ���
		$return = $this->_usePoint();
		if($return) return $return;
		// �߸ˤ򸺻�
		$return = $this->_useStock();
		if($return) return $return;
		// ��ʸ�᡼�������
		$return = $this->_sendOrderMail();
		if($return) return $return;
		// ��ʸ���ԡ�
		$return = $this->_orderCopy();
		if($return) return $return;
		
		/* =============================================
		// ���ײ��ϥǡ����ɲý���
		 ============================================= */
		$s = & $this->backend->getManager('Stats');
		foreach($this->cart_list as $k => $v){
			// ���������INSERT access:0,buy:1
			$s->addStats('item', $v['item_id'], 0, 1);
		}
		
		// ������
		$this->log_body .= "user_order_mail = \n";
		$this->log_body .= @var_export($mail_values, true)."\n";
		$this->log_body .= "\nend {date('Y-m-d H:i:s')}\n";
		// ������
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','order_log');
		$o->set('log_body',$this->log_body);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		// �����ȥϥå�����ȯ��
		$this->session->set('cart_hash', $this->um->getUniqId());
		
		return 'user_ec_order_done';
	}
	
	/**
	 * �㤤ʪ��������Ȥ򥻥å�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 * @todo   �߸˳�ǧ������κ�Ŭ����3�ơ��֥���礷�Ƥ��뤿�ᡢ2�ơ��֥�ޤǤη��Ȥ�������
	 */
	function _setCartList()
	{
		// �����ȥϥå���򸵤��㤤ʪ����������ʤκ߸ˤ��ǧ����
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�)
		// �߸˥ơ��֥���礹��
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, true);
		// �㤤ʪ��������˾��ʤ��ʤ����
		if(count($r) == 0){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		// �㤤ʪ��������˾��ʤ�������
		else{
			// �㤤ʪ��������Ȥ���Ф˥��å�
			$this->cart_list = $r;
		}
		
		return null;
	}
	
	/**
	 * �߸˳�ǧ
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _checkStock()
	{
		// �㤤ʪ��������˾��ʤ��ʤ����
		if(count($this->cart_list) == 0){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// �����ॹ�����
		$timestamp = date('Y-m-d H:i:s');
		
		// ���٤Ƥ��㤤ʪ��������Ȥ��Ф��ƽ�����Ԥ�
		$return = null;
		foreach($this->cart_list as $k => $v){
			// �㤤ʪ��������κ���ե饰
			$delete = false;
			
			// ���ʾ�������
			$i = new Tv_Item($this->backend, 'item_id', $v['item_id']);
			// ͭ���ʥ쥳���ɤξ��
			if($i->isValid()){
				// ���ʥ��ơ�������ͭ������ǧ
				if($i->get('item_status') == 0){
					// �㤤ʪ��������������
					$delete = true;
				}
				// ��������⤫��ǧ�ʸ��߻��郎���ϻ����꾮����������λ�������礭������NG��
				if(
					($i->get('item_start_status') == 1 && $timestamp < $i->get('item_start_time'))
					||
					($i->get('item_end_status') == 1 && $timestamp > $i->get('item_end_time'))
				){
					// �㤤ʪ��������������
					$delete = true;
				}
			}
			// ̵���ʥ쥳���ɤξ��
			else{
				$delete = true;
			}
			// ���ȥå���������
			$s = new Tv_Stock($this->backend, 'stock_id', $v['stock_id']);
			// ͭ���ʥ쥳���ɤξ��
			if($s->isValid()){
				// �߸ˤ�¸�ߤ��뤫��ǧ�ʺ߸˿����㤤ʪ������θĿ����⾯�ʤ�����NG��
				if($s->get('stock_num') < $v['item_num']){
					// �㤤ʪ��������������
					$delete = true;
				}
			}
			// ̵���ʥ쥳���ɤξ��
			else{
				$delete = true;
			}
			// �㤤ʪ����������������
			if($delete){
				// �㤤ʪ������������äƤ���쥳���ɤ��������
				$o = & new Tv_Cart($this->backend, cart_id, $v['cart_id']);
				// �쥳���ɤ�¸�ߤ�����
				if($o->isValid()){
					// ���
					$o->remove();
				}
				
				// ���ʼ��̤�������
				if($v['item_type']){
					$this->ae->add('errors', W_USER_ITEM . "��{$v['item_name']}��" . W_USER_STOCK . "��{$v['item_type']}�κ߸ˤ��ʤ��ʤäƤ��ޤ��ޤ�����");
				}
				// ���ʼ��̤��ʤ����
				else{
					$this->ae->add('errors', W_USER_ITEM . "��{$v['item_name']}�κ߸ˤ��ʤ��ʤäƤ��ޤ��ޤ�����");
				}
				
				// �㤤ʪ�������̤�����
				$return = 'user_ec_cart';
			}
		}
		
		// �����褬���ꤵ��Ƥ�����
		if($return){
//			$this->ae->add(null, '', E_USER_STOCK_ORDER_OVER);
			return $return;
		}
		
		return null;
	}
	
	/**
	 * ��ʧ����ۤ򥻥å�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _setPayment()
	{
		// �㤤ʪ��׶�ۤν����
		$this->order['total_price1'] = 0;
		// �����ݥ���Ȥν����
		$this->order['get_point'] = 0;
		// �㤤ʪ������׾��ʸĿ��ν����
		$total_num = 0;
		// ���٤Ƥ��㤤ʪ��������Ȥ��Ф��ƽ�������
		foreach($this->cart_list as $k => $v){
			// �㤤ʪ�����쥳���ɤξ��פ�׻�����
			$this->cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// ������ȴ���ι�׶�ۤ�û�����
			$this->order['total_price1'] += $v['item_price'] * $v['cart_item_num'];
			// ��׾��ʸĿ���û�����
			$total_num += $v['cart_item_num'];
			// �ݥ���ȷ׻�
			$this->order['get_point'] += $v['item_point'] * $v['cart_item_num'];
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
		
		/*
		 * �����Ǥη׻�
		 */
		$this->order['tax'] = floor($this->order['total_price1']/21);
		
		/*
		 * ����
		 * @param array $this->cart_list ���ʾ���ꥹ��
		 * @return integer ����
		 */
		$this->order['postage'] = 0;
		// ����¾����������ξ��ϡ����������ƻ�ܸ��˾��
		if($this->af->get('user_order_delivery_type') == 2) $this->user->set('region_id', $this->af->get('user_order_delivery_region_id'));
		// ���������
		if(!$this->cart_list) return 'user_error';
		$this->order['postage'] = $this->um->getPostage($this->cart_list, $unit_item_detail, $unit_stock_detail, $this->user->get('region_id'));
		
		/*
		 * ����������
		 * @param array $this->cart_list ���ʾ���ꥹ��
		 * @return integer ����������
		 */
		$this->order['exchange_fee'] = 0;
		if($this->af->get('user_order_type') == 3){
			if(!$this->cart_list) return 'user_error';
			$this->order['exchange_fee'] = $this->um->getExchangeFee($this->cart_list, $unit_item_detail, $unit_stock_detail);
		}
		
		/*
		 * �ݥ���ȷ׻�
		 */
		$this->order['expend_point'] = 0;
		if($this->af->get('user_order_use_point_status') == 1){
			$this->order['use_point_status'] = 1;
			$this->order['expend_point'] = $this->af->get('user_order_use_point');
		}
		
		
		// ���ʾ��� < ���Ѥ���ݥ���Ȥξ���Ĵ��
		$rest_point = 0;
		if($this->order['total_price1'] < $this->order['expend_point']){
			$rest_point = $this->order['expend_point'] - $this->order['total_price1'];//�ݥ���Ȥ�;��
			$this->order['expend_point'] = $this->order['total_price1'];
		}
		$this->af->setApp('user_order_expend_point', $this->order['expend_point']);
		
		/*
		 * ��׶��
		 */
		$this->order['total_price2'] = $this->order['total_price1'] - $this->order['expend_point'] + $this->order['postage'] + $this->order['exchange_fee'];
		
	}
	
	/**
	 * ��ʧ�������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _payment()
	{
		//��ʧ����ˡ�ϡ�10:1��ʧ��,61:ʬ��ʧ��,80:���ʧ��
		if($this->af->get('user_order_card_revo_status') == 1){
			$paymode = 80;
		}else{
			$paymode = 10;
		}
		
		// ��Ѿ�������
		switch($this->af->get('user_order_type'))
		{
			case 1:
				// ���쥸�åȷ���ѥѥ�᡼��
				$credit_auth_values = array(
				//	'SHOP_ID' 			=> 															//Ź��ID��Util�ǻ��ꤹ��
					'PAY'				=> $this->order['total_price2'],							//��ۡʥ�������ס�
					'PAN1'				=> substr($this->af->get('user_order_card_number'),0,4),	//�������ֹ�1-4
					'PAN2'				=> substr($this->af->get('user_order_card_number'),4,4),	//�������ֹ�5-8
					'PAN3'				=> substr($this->af->get('user_order_card_number'),8,4),	//�������ֹ�9-12
					'PAN4'				=> substr($this->af->get('user_order_card_number'),12,4),	//�������ֹ�13-16
					'CARDEXPIRY1'		=> $this->af->get('user_order_card_month'),					//ͭ�����¡ʷ��
					'CARDEXPIRY2'		=> $this->af->get('user_order_card_year'),					//ͭ�����¡�ǯ��
					'ID'				=> $this->session->get('cart_hash'),						//��ɼ�ֹ�ʼ����Ѥ������ID��Ⱦ�ѱѿ����ܥϥ��ե����Ѳ�ǽ�ǡ�20ʸ������
					'CARDNAME'			=> $this->af->get('user_order_card_name'),					//������̾�����������Ѳ�ǽ�ǡ�Ⱦ�Ѵ�����255ʸ�������
				//	'CHARCODE'			=> ,														//���Ѥ�����������Υ��󥳡��ǥ���������euc�ס�sjis�ס�utf8�פ�3����
				//	'IP'				=> ,														//��ǧ���Υ桼����IP���ɥ쥹��Ǥ�ա�
					'PAYMODE'			=> $paymode,												//��ʧ����ˡ��10:1��ʧ��,61:ʬ��ʧ��,80:���ʧ������ά�ġʾ�ά����1��ʧ����
				//	'PAYACOUNT'			=> ,														//��ʧ�������01,02,03,05,06,10,12,15,18,20,24����ά�ġʾ�ά����1��ʧ����
				//	'MOBILE'			=> ,														//1:MOBILE��ͳ,0:PC��ͳ����ά�ġʾ�ά����PC��ͳ��
				);
				
				// ������
				$this->log_body.= "user_order_type                = {$this->af->get('user_order_type')}\n";
				$this->log_body.= "credit_auth_values PAY         = {$this->order['total_price2']}\n";
				$this->log_body.= "credit_auth_values PAN1        = ****\n";
				$this->log_body.= "credit_auth_values PAN2        = ****\n";
				$this->log_body.= "credit_auth_values PAN3        = ****\n";
				$this->log_body.= "credit_auth_values PAN4        = {substr($this->af->get('user_order_card_number'),12,4)}\n";
				$this->log_body.= "credit_auth_values CARDEXPIRY1 = {$this->af->get('user_order_card_month')}\n";
				$this->log_body.= "credit_auth_values CARDEXPIRY2 = {$this->af->get('user_order_card_year')}\n";
				$this->log_body.= "credit_auth_values ID          = {$this->session->get('cart_hash')}\n";
				$this->log_body.= "credit_auth_values CARDNAME    = {$this->af->get('user_order_card_name')}\n";
				$this->log_body.= "credit_auth_values PAYMODE     = {$paymode}\n";
				
				//���쥸�åȷ������
				$credit_auth_ret = $this->um->sendOrderRequest('auth',$credit_auth_values);
				
				// ������
				$this->log_body.= "credit_auth_ret = \n";
				$this->log_body.= @var_export($credit_auth_ret, true)."\n";
				
				// ����ͤ������Ǥ��ʤ��ä����(�̿����顼)
				if($credit_auth_ret[0] != "OK"){
					//���쥸�åȷ�ѥ��顼
					$this->ae->add(null, '', E_USER_ORDER_USE_CARD_ERROR);
					$this->ae->add(null, '', $credit_auth_ret[1]);
					$this->cart_status = 0;//̤���
					
					// ������
					$this->log_body .= "���쥸�åȷ�Ѥ˼��Ԥ��ޤ�����\n���쥸�åȷ�Ѥˤ������ƥ��Ȥ�»ܤ��ơ����꤬�ʤ����Ȥ��ǧ���Ƥ���������";
					// ������
					$o = & new Tv_Log($this->backend);
					$o->set('log_type','order_error_credit');
					$o->set('log_body',$this->log_body);
					$o->set('log_created_time',date('Y-m-d H:i:s'));
					$o->add();
					
					// ���顼�᡼������
					$ms = new Tv_Mail($this->backend);
					$value = array ('alert_subject' => '�ڽ��ס�EC alert!!! ','alert_date' => date('Y-m-d H:i:s'),'alert_file' => __FILE__,'alert_body' => "���쥸�åȷ�Ѥ˼��Ԥ��ޤ�����\n���쥸�åȷ�Ѥˤ������ƥ��Ȥ�»ܤ��ơ����꤬�ʤ����Ȥ��ǧ���Ƥ���������\n\n$this->log_body",);
					$ms->send($this->config->get('admin_mailaddress'), 'alert', $value);
					
					return 'user_ec_cart';
				}else{
					//���쥸�åȷ��OK
					$this->cart_status = 2;//��ѺѤ�
				}
				
				$this->order['credit_auth_code'] = '';
				$this->order['credit_auth_code'] = $credit_auth_ret[1];
				$this->order['credit_exchange_code'] = '';
				$this->order['credit_exchange_code'] = $credit_auth_ret[2];
				
				// ������
				$this->log_body.= "credit_auth_code     = {$this->order['credit_auth_code']}\n";
				$this->log_body.= "credit_exchange_code = {$this->order['credit_exchange_code']}\n";
				
				/*
				// ���쥸�åȷ�Ѥξ�硢�������ƥ����Թ�夳�λ����Ǥϥ����륳���ɤ�Ω�Ƥʤ�
				$credit_sale_values = array(
					'SHOPID'		=> $this->config->get('SHOPID'),
					'AUTHCODE'		=> $this->order['credit_auth_code'],
					'SEQNO'			=> $this->order['credit_exchange_code'],
				);
				$credit_sale_ret = $this->um->sendOrderRequest("sale",$credit_sale_values);
				if($credit_sale_ret[0] != "OK"){
					$this->ae->add(null, '', E_USER_ORDER_USE_CARD_ERROR);
					$this->ae->add("errors",$credit_sale_ret[1]);
					return 'user_ec_cart';
				}
				*/
				break;
			case 2:
				//����ӥ˥����פ�seveneleven�ξ��
				$requireurl = 0;
				if($this->af->get('user_order_conveni_type') == 'seveneleven') $requireurl = 1;
				
				// ����ӥ˷��
				$conveni_order_values = array(
				//	'SHOPID'			=> ,											//Ź��ID��Util�ǻ��ꤹ��							ɬ��
					'PAY'				=> $this->order['total_price2'],					//��ۡ�300-299999�ʥ���޶��ڤ��Բġ�				ɬ��
					'ID'				=> $this->session->get('cart_hash'),			//��ɼ�ֹ桧����20ʸ���αѿ����ʼ����������ѡ�	ɬ��
					'CUSTOMERNAME1'		=> $this->user->get('user_name'),				//��̾1�����ܸ��ǽ�ʺ���10ʸ������������̾			ɬ��
				//	'CUSTOMERNAME2'		=> ,											//��̾2�����ܸ��ǽ�ʺ���10ʸ����̾					Ǥ��
				//	'CHARCODE'			=> ,											//ʸ�������ɡ����ܸ������������Υ��󥳡��ǥ���������euc�ס�sjis�ס�utf8�פ�3����	Ǥ��
					'CUSTOMERTEL'		=> $this->user->get('user_phone'),				//�����ֹ桧����13��								ɬ��
					'CONVENI'			=> $this->af->get('user_order_conveni_type'),	//����ӥˡ�seveneleven�ס�famima�ס�lawson�ס�seicomart�פ�4����						Ǥ��
				//	'EXPIRE'			=> ,											//��ʧ�����¡�ʧ�����ߤ���ǽ�ʴ��¡�yyyymmdd���������Ͽ�������դ���⡹���ʹ�30������	Ǥ��
				//	'EXPIRESPAN'		=> ,											//��ʧ�����¡������Τߡ�2������30����				Ǥ��
					'REQUIREURL'		=> $requireurl,									//URL�׵ᡧ��0�פޤ��ϡ�1��1�ξ�硢���֥󥤥�֥��ʧ������ɼURL���������				Ǥ��
				//	'IP'				=> ,											//IP���ɥ쥹���������̾�Ǥλ�����					Ǥ��
				);
				
				// ������
				$this->log_body.= "user_order_type = {$this->af->get('user_order_type')}\n";
				$this->log_body.= "conveni_order_values = \n";
				$this->log_body.= @var_export($conveni_order_values, true)."\n";
				
				//����ӥ˷������
				$conveni_order_ret = $this->um->sendOrderRequest('convorder',$conveni_order_values);
				
				// ������
				$this->log_body.= "conveni_order_ret = \n";
				$this->log_body.= @var_export($conveni_order_ret, true)."\n";
				
				if($conveni_order_ret[0] != "OK"){
					//����ӥ˷�ѥ��顼
					$this->ae->add(null, '', E_USER_ORDER_USE_CONVENI_ERROR);
					$this->ae->add(null, '', $conveni_order_ret[1]);
					$this->cart_status = 0;//̤���
					
					// ������
					$this->log_body .= "����ӥ˷�Ѥ˼��Ԥ��ޤ�����\n����ӥ˷�Ѥˤ������ƥ��Ȥ�»ܤ��ơ����꤬�ʤ����Ȥ��ǧ���Ƥ���������";
					// ������
					$o = & new Tv_Log($this->backend);
					$o->set('log_type','order_error_conveni');
					$o->set('log_body',$this->log_body);
					$o->set('log_created_time',date('Y-m-d H:i:s'));
					$o->add();
					
					// ���顼�᡼������
					$ms = new Tv_Mail($this->backend);
					$value = array (
						'alert_subject' => '�ڽ��ס�EC alert!!! ',
						'site_name'		=> $site_name,
						'alert_date' 	=> date('Y-m-d H:i:s'),
						'alert_file' 	=> __FILE__,
						'alert_body' 	=> "����ӥ˷�Ѥ˼��Ԥ��ޤ�����\n����ӥ˷�Ѥˤ������ƥ��Ȥ�»ܤ��ơ����꤬�ʤ����Ȥ��ǧ���Ƥ���������\n\n$this->log_body",
					);
					$ms->send($this->config->get('admin_mailaddress'), 'alert', $value);
					
					return 'user_ec_cart';
				}else{
					//����ӥ˷��OK
					$this->cart_status = 0;//̤���
				}
				$this->order['conveni_sale_code'] = $conveni_order_ret[1];
				$this->order['conveni_exchange_code'] = $conveni_order_ret[2];
				$this->order['conveni_pay_url'] = $conveni_order_ret[3];
				
				// ������
				$this->log_body.= "user_order_conveni_sale_code     = {$this->order['conveni_sale_code']}\n";
				$this->log_body.= "user_order_conveni_exchange_code = {$this->order['conveni_exchange_code']}\n";
				$this->log_body.= "user_order_conveni_pay_url       = {$this->order['conveni_pay_url']}\n";
				break;
			default:
				break;
		}
		
		return null;
	}
	
	/**
	 * �㤤ʪ�����������ʸ�Ѥߤ˹���
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _updateCart()
	{
		// �㤤ʪ��������˾��ʤ��ʤ����
		if(count($this->cart_list) == 0){
			// ���顼���̤�����
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// ���٤Ƥ��㤤ʪ��������Ȥ��Ф��ƽ�����Ԥ�
		foreach($this->cart_list as $k => $v){
			//�����Ⱦ���򹹿�
			$cart =& new Tv_Cart($this->backend, 'cart_id', $v['cart_id']);
			$cart->set('cart_status', $this->cart_status);
			$cart->set('user_id', $this->user->get('user_id'));
			$cart->set('cart_no', date('Y-m-d') . "-" . $v['cart_id']);
			$cart->set('cart_updated_time', date('Y-m-d H:i:s'));
			$cart->update();
			if (PEAR::isError($res)) return 'user_error';
			// ������
			foreach($this->backend->db_list as $a)$this->log_body.= "cart_update_query = ".$a->db->last_query."\n";
		}
	}
	
	/**
	 * �ݥ���Ȥ򸺻�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _usePoint()
	{
		if($this->order['use_point_status']){
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���(�ݥ������Ϳ����ơ��֥�˺���Υݥ������Ϳ(����)������Ͽ
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'			=> $this->user->get('user_id'),
				'point'				=> '-' . $this->order['expend_point'],
				'point_type'		=> $point_type_search['order'],
				'point_memo'		=> 'ORDER',
			);
			$pm->addPoint($param);
			//Log
			foreach($this->backend->db_list as $a)$this->log_body.= "point_update_query = ".$a->db->last_query."\n";
		}
	}
	
	/**
	 * �߸ˤ򸺻�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _useStock()
	{
		// �߸˸���
		foreach($this->cart_list as $k => $v){
			// �߸˾�������
			$o =& new Tv_Stock($this->backend, 'stock_id', $v["stock_id"]);
			$o->set('stock_num', $v['stock_num'] - $v['cart_item_num']);
			$r = $o->update();
			if(Ethna::isError($r)) return 'user_error';
			
			// ������
			foreach($this->backend->db_list as $a)$this->log_body.= "stock_update_query = ".$a->db->last_query."\n";
			
			// �߸˴����᡼��
			if($this->config->get('stock_alert_num') > $v['stock_num'] - $v['cart_item_num']){
				// ����ơ��֥뤫�����Ū��������������
				$param = array(
					'sql_select'	=> 'sum(cart_item_num) as cart_item_sum',
					'sql_from'		=> 'cart',
					'sql_where'		=> 'item_id = ? group by item_id',
					'sql_values'	=> array($v['item_id']),
				);
				$r =  $this->um->dataQuery($param);
				// �����ꥨ�顼�Ǥ�᡼���������ͥ�褹��
				$cart_item_sum = $r[0]['cart_item_sum'];
				
				// �����԰��˥᡼�������
				$ms =& new Tv_Mail($this->backend);
				$mail_values = array(
					'from_mail_address' 	=> $this->config->get('admin_mailaddress'),
					'site_name'				=> $site_name,
					'item_id'				=> $v['item_id'],
					'item_name'				=> $v['item_name'],
					'item_type'				=> $v['item_type'],
					'item_stock'			=> $v['stock_num'] - $v['cart_item_num'],
					'now_date'				=> date('y/m/d H:i'),
					'item_distinction_id' 	=> $v['item_distinction_id'],
					'admin_url' 			=> ADMIN_URL,
					'cart_item_sum' 		=> $cart_item_sum,
				);
				$ms->sendOne($this->config->get('stock_alert_to_mailaccount'), 'stock_alert', $mail_values);
				
				// ������
				$this->log_body.= "stock_alert_mail = \n";
				$this->log_body.= @var_export($mail_values, true)."\n";
			}
		}
	}
	
	/**
	 * ��ʸ���ƥ᡼�������
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _sendOrderMail()
	{
		// ������ֹ椫��̾�����Ѵ�
		//��ƻ�ܸ��ꥹ��
		$this->um =& $this->backend->getManager('Util');
		$region_id_list = $this->config->get('region_id');
		$this->user->set('region_id', $region_id_list[$this->user->get('region_id')]['name']);
		$this->order['delivery_region_id'] = $region_id_list[$this->af->get('user_order_delivery_region_id')]['name'];
		
		//��ã���ֻ���������ʸ���Ѵ�
		if($this->af->get('user_order_delivery_day')){
			$delivery_date = $this->config->get('delivery_date');
			$this->order['delivery_day'] = $delivery_date[$this->af->get('user_order_delivery_day')];
		}
		
		// ��ʸ���Ƴ�ǧ�᡼������
		$mail_values = array(
			// ��Ѵ�Ϣ����
			'cart_list' => $this->cart_list,
			'user_order_type' => $this->af->get('user_order_type'),
			'user_order_total_price1' => $this->order['total_price1'],
			'user_order_total_price2' => $this->order['total_price2'],
			'user_order_tax' => $this->order['tax'],
			'user_order_expend_point' => $this->order['expend_point'],
			'user_order_get_point' => $this->order['get_point'],
			'user_order_postage' => $this->order['postage'],
			'user_order_exchange_fee' => $this->order['exchange_fee'],
			// ����ӥ˷�Ѵ�Ϣ����
			'user_order_conveni_type' => $this->af->get('user_order_conveni_type'),
			'user_order_conveni_sale_code' => $this->order['conveni_sale_code'],
			//����ӥ�ʧ��ɼURL
			'user_order_conveni_pay_url' => $this->order['conveni_pay_url'],
			// �桼����Ϣ����
			'user_zipcode' => $this->user->get('user_zipcode'),
			'user_name' => $this->user->get('user_name'),
			'region_id' => $this->user->get('region_id'),
			'user_address' => $this->user->get('user_address'),
			'user_address_building' => $this->user->get('user_address_building'),
			'user_phone' => $this->user->get('user_phone'),
			'user_mailaddress' => $this->user->get('user_mailaddress'),
			// �������Ϣ����
			'user_order_delivery_type' => $this->af->get('user_order_delivery_type'),
			'user_order_delivery_name' => $this->af->get('user_order_delivery_name'),
			'user_order_delivery_zipcode' => $this->af->get('user_order_delivery_zipcode'),
			'user_order_delivery_region_id' => $this->order['delivery_region_id'],
			'user_order_delivery_address' => $this->af->get('user_order_delivery_address'),
			'user_order_delivery_address_building' => $this->af->get('user_order_delivery_address_building'),
			'user_order_delivery_phone' => $this->af->get('user_order_delivery_phone'),
			'user_order_delivery_day' => $this->order['delivery_day'],
			'user_order_delivery_note' => $this->af->get('user_order_delivery_note'),
			// �����ԥ��ɥ쥹
			'admin_mailaddress' => $this->config->get('admin_mailaddress'),
			//��ʸ����(tbl_order.order_created_time)
			'user_order_created_time' => $this->order['created_time'],
			//��ʸ�ֹ�(user_order.user_order_id)
			'user_order_id' => $this->order['id'],
			//��ʸ�ֹ�(date('Ymd')+user_order.user_order_id)
			'user_order_no' => $this->order['no'],
		);
		// ����ӥ˻�ʧ���ξ��
		if($this->af->get('user_order_type') == 2){
			// ���ꥳ��ӥˤι��ܤ�ͭ����
			$mail_values[$this->af->get('user_order_conveni_type')] =true;
		}
		// �桼��������
		$ms = new Tv_Mail($this->backend);
		$ms->sendOne($this->user->get('user_mailaddress') , "user_order{$this->af->get('user_order_type')}" , $mail_values );
		
		// �����ƥ�����Ԥؤ�Ʊ���᡼�������
		$ms->sendOne($this->config->get('user_order_copy_mailaddress') , "user_order{$this->af->get('user_order_type')}" , $mail_values );
	}
	
	/**
	 * ��ʸ
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _order()
	{
		// ��������������Ͽ
		$o =& new Tv_UserOrder($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('user_id', $this->user->get('user_id'));
		$o->set('cart_id', $cart_id);
		$o->set('cart_hash', $this->session->get('cart_hash'));
		$o->set('user_order_type', $this->af->get('user_order_type'));
		$o->set('user_order_use_point', $this->order['expend_point']);
		$o->set('user_order_get_point', $this->order['get_point']);
		$o->set('user_order_card_number', '************' . substr($this->af->get('user_order_card_number'), 12, 4));
		$o->set('user_order_card_expiration', $this->af->get('user_order_card_year') . "/" . $this->af->get('user_order_card_month'));
		$o->set('user_order_credit_auth_code', $this->order['credit_auth_code']);
		$o->set('user_order_credit_exchange_code', $this->order['credit_exchange_code']);
		$o->set('user_order_conveni_sale_code', $this->order['conveni_sale_code']);
		$o->set('user_order_conveni_exchange_code', $this->order['conveni_exchange_code']);
		$o->set('user_order_conveni_pay_url', $this->order['conveni_pay_url']);
		$o->set('user_order_total_price1', $this->order['total_price1']);
		$o->set('user_order_total_price2', $this->order['total_price2']);
		$o->set('user_order_tax', $this->order['tax']);
		$o->set('user_order_postage', $this->order['postage']);
		$o->set('user_order_exchange_fee', $this->order['exchange_fee']);
		$o->set('user_order_created_time', $this->order['created_time'] = date("Y-m-d H:i:s", time()));
		$r = $o->add();
		// �����ꥨ�顼�ξ��
		if(Ethna::isError($r)) return 'user_error';
		// ������
		foreach($this->backend->db_list as $a)$this->log_body.= "user_order_insert_query = ".$a->db->last_query."\n";
		
		// user_order.user_order_no�ˡ���������tbl_order_id + date ������롣
		$this->order['id'] = $o->getId();
		$user_zero_fill_order_id = sprintf("%010d", $this->order['id']);
		$this->order['no'] = date('Ymd').$user_zero_fill_order_id;
		
		// ��ʸ����򹹿�����
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->order['id']);
		$o->set('user_order_no', $this->order['no']);
		$r = $o->update();
		// �����ꥨ�顼�ξ��
		if(Ethna::isError($r)) return 'user_error';
		
		// start
		// Ʊ���Բ�����λ���$unit_item_detail�����ˤʤäƤ��ޤ�����ˤ����Ǻ��ٻ��� ������ʬ����ޤǡ�����
		// ���٤Ƥ��㤤ʪ��������Ȥ��Ф��ƽ�������
		foreach($this->cart_list as $k => $v){
			// �㤤ʪ�����쥳���ɤξ��פ�׻�����
			$this->cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// ������ȴ���ι�׶�ۤ�û�����
			$this->order['total_price1'] += $v['item_price'] * $v['cart_item_num'];
			// ��׾��ʸĿ���û�����
			$total_num += $v['cart_item_num'];
			// �ݥ���ȷ׻�
			$this->order['get_point'] += $v['item_point'] * $v['cart_item_num'];
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
		// end
		
		//ȯ��ñ�̤�DB�˳�Ǽ����
		$this->um->insertPostUnit($this->cart_list, $unit_item_detail, $unit_stock_detail ,$this->user->get('region_id'));
		// ������
		foreach($this->backend->db_list as $a)$this->log_body.= "user_update_query = ".$a->db->last_query."\n";
		
		/* =============================================
		// �����ϩ��ͳ�ξ��ν���
		 ============================================= */
/* �����ϩ���Ф������������ϹԤ�ʤ�
		if($this->session->get('media_access_hash')){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($this->session->get('media_access_hash'), $no_point);
		}
*/
		/* =============================================
		// �����ϩ�������ײ��Ͻ���
		 ============================================= */
		if($this->user->get('media_id')){
			$sm = $this->backend->getManager('Stats');
			// ���������INSERT 0:mail 1:access 2:reg
			$sm->addStats('media', $this->user->get('media_id'), 0, 5);
		}
	}
	
	/**
	 * ��ʸ�򥳥ԡ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function _orderCopy()
	{
		// DB���Ǥ���ޤ���α
		//�������Υ桼���������Ͽ
		$o =& new Tv_UserOrderCopy($this->backend);
		$o->set('user_order_id', $this->order['id']);
		$o->set('user_id', $this->user->get('user_id'));
		$o->set('user_name', $this->user->get('user_name'));
		$o->set('user_nickname', $this->user->get('user_nickname'));
		$o->set('user_name_kana', $this->user->get('user_name_kana'));
		$o->set('user_zipcode', $this->user->get('user_zipcode'));
		$o->set('region_id', $this->user->get('region_id'));
		$o->set('user_address', $this->user->get('user_address'));
		$o->set('user_address_building', $this->user->get('user_address_building'));
		$o->set('user_phone', $this->user->get('user_phone'));
		$o->set('user_birth_date', $this->user->get('user_birth_date'));
		$o->set('user_sex', $this->user->get('user_sex'));
		$o->set('user_mailaddress', $this->user->get('user_mailaddress'));
		$o->set('user_password', $this->user->get('user_password'));
		$o->set('user_point', $this->user->get('user_point'));
		$o->set('user_hash', $this->user->get('user_hash'));
		$o->set('user_status', $this->user->get('user_status'));
		$o->set('user_created_time', $this->user->get('user_created_time'));
		$o->set('user_updated_time', $this->user->get('user_updated_time'));
		$o->set('user_order_time', $this->user->get('user_order_time'));
		$o->set('user_deleted_time', $this->user->get('user_deleted_time'));
		$o->set('user_uid', $this->user->get('user_uid'));
		$o->set('user_magazine_error_num', $this->user->get('user_magazine_error_num'));
		$o->set('user_sessid', $this->user->get('user_sessid'));
		$r = $o->add();
		// �����ꥨ�顼�ξ��
		if(Ethna::isError($r)) return 'user_error';
		
		// �ǽ�����������������
		$user =& new Tv_User($this->backend, 'user_id', $this->user->get('user_id'));
		$user->set('user_order_time', date('Y-m-d H:i:s'));
		$r = $user->update();
		// �����ꥨ�顼�ξ��
		if(Ethna::isError($r)) return 'user_error';
	}
}
?>