<?php
/**
 * Check.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ʸ��ǧ���̥��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderCheck extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		// ���ܥѥ�᡼��
		'cart_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
			'regexp'	=> '/^[0-9]+$/',
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, delivery_type',
		),
		//��ã���ֻ���
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'		=> 'Util, delivery_date',
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// �����ɥѥ�᡼��
		'user_order_card_type' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, card_type',
		),
		// �������ֹ�
		'user_order_card_number' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// ������ͭ������ ��
		'user_order_card_month' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> array(
								'0' => '��',
								'01' => '01',
								'02' => '02',
								'03' => '03',
								'04' => '04',
								'05' => '05',
								'06' => '06',
								'07' => '07',
								'08' => '08',
								'09' => '09',
								'10' => '10',
								'11' => '11',
								'12' => '12',
							),
		),
		// ������ͭ������ ǯ
		'user_order_card_year' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> array(
								'0' => 'ǯ',
								'08' => '2008',
								'09' => '2009',
								'10' => '2010',
								'11' => '2011',
								'12' => '2012',
								'13' => '2013',
								'14' => '2014',
								'15' => '2015',
								'16' => '2016',
								'17' => '2017',
								'18' => '2018',
							),
		),
		// ����ӥ˥ѥ�᡼��
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_order_conveni_type_user',
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
			'type'        => VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type' 			=> VAR_TYPE_INT,
			'required' 		=> true,
			'form_type' 	=> FORM_TYPE_TEXT,
			'min' 			=> 10,
			'max' 			=> 11,
			'regexp'		=> '/^[0-9]+$/',
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
			'form_type'        => FORM_TYPE_SELECT,
			'option'        => array(
				0 => '����ʧ��',
				1 => '���ʧ��',
			),
		),
	);
}

/**
 * ��ʸ��ǧ���̥��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderCheck extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
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
		
		$um = $this->backend->getManager('Util');
		
		$errors = false;
		
		// �����ˡ�����ꤵ��Ƥ��ʤ����
		if($this->af->get('user_order_type') == ""){
			$this->ae->add(null, '', E_USER_ORDER_TYPE);
			return 'user_ec_cart';
		}
		
		// ͭ�������ڤ�ξ��ʤ������Ȥ˴ޤޤ�Ƥ�����
		$cart_hash = $this->session->get('cart_hash');
		
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
		
		$now = date('Y-m-d H:i:s');
		foreach($cart_list as $k => $v){
			// ͭ���ʥ��ơ������ξ��ʤΤ߼�������
			$sqlWhere = 'item_id = ? AND item_status = 1';
			// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
			$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
			// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
			$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
			
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'item',
				'sql_where'		=> $sqlWhere,
				'sql_values'	=> array($v['item_id']),
			);
			
			$r = $um->dataQuery($param);
			if(count($r) == 0){
				$this->ae->add(null, '', E_USER_ITEM_NOT_FOUND);
				return 'user_ec_cart';
			}
		}
		
		// ���쥸�åȥ����ɷ�ѻ�
		if($this->af->get('user_order_type') == 1){
			if(!$this->af->get('user_order_card_type')){
				$errors[] = E_USER_ORDER_CARD_TYPE;
			}
			if(!$this->af->get('user_order_card_number')
				|| strlen($this->af->get('user_order_card_number')) < 13
				|| strlen($this->af->get('user_order_card_number')) > 19
				|| !preg_match( '/^[0-9]+$/', $this->af->get('user_order_card_number') )
			){
				$errors[] = E_USER_ORDER_CARD_NUMBER;
			}
			
			if(!$this->af->get('user_order_card_name')){
				$errors[] = E_USER_ORDER_CARD_NAME;
			}
			if(!$this->af->get('user_order_card_month')){
				$errors[] = E_USER_ORDER_CARD_MONTH;
			}
			if(!$this->af->get('user_order_card_year')){
				$errors[] = E_USER_ORDER_CARD_YEAR;
			}
			// ������ͭ�����¤����ξ��
			if( date('Ym') > '20'.sprintf('%02d%02d', $this->af->get('user_order_card_year'), $this->af->get('user_order_card_month')) ){
				$errors[] = E_USER_ORDER_CARD_TERM;
			}
			
			// �����Ф����ǥ��쥸�åȥ����ɤ����Ѳ�ǽ�������å�������
			
		}
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			// HIDDEN�ե���������
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_type_1';
		}
		
		// ����ӥ˷�ѻ�
		if($this->af->get('user_order_type') == 2){
			if(!$this->af->get('user_order_conveni_type')){
				$errors[] = E_USER_ORDER_CONVENI_TYPE;
			}
		}
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			// HIDDEN�ե���������
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_type_2';
		}
		
		// ������������ϻ�
		if($this->af->get('user_order_delivery_type') == 2 && $this->af->get('mode') != "type"){
			if(!$this->af->get('user_order_delivery_name')){
				$errors[] = E_USER_ORDER_DELIVERY_NAME;
			}
			if(!$this->af->get('user_order_delivery_name_kana')){
				$errors[] = E_USER_ORDER_DELIVERY_NAME_KANA;
			}
			if(mb_strlen($this->af->get('user_order_delivery_zipcode')) != 7
				|| !preg_match( '/^[0-9]+$/', $this->af->get('user_order_delivery_zipcode'))
			){
				$errors[] = E_USER_ORDER_DELIVERY_ZIPCODE;
			}
			if(!$this->af->get('user_order_delivery_region_id')){
				$errors[] = E_USER_ORDER_DELIVERY_REGION_ID;
			}
			if(!$this->af->get('user_order_delivery_address')){
				$errors[] = E_USER_ORDER_DELIVERY_ADDRESS;
			}
			if(mb_strlen($this->af->get('user_order_delivery_phone')) < 10
				|| mb_strlen($this->af->get('user_order_delivery_phone')) > 11
				|| !preg_match('/^[0-9]+$/', $this->af->get('user_order_delivery_phone'))
			){
				$errors[] = E_USER_ORDER_DELIVERY_PHONE;
			}
		}
		
		/*
		 * Ʊ���Բ�������ǧ����
		 */
		
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			
			$this->af->set('mode','delivery');
			// HIDDEN�ե���������
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_delivery';
		}
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
		$um = $this->backend->getManager('Util');
		
		// �桼����������
		$user = $this->session->get('user');
		$r =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		
		if ($this->af->get('mode') == "type")
		{
			if($this->af->get('user_order_delivery_type') == 2)
			{
				$this->af->set('mode','delivery');
				// HIDDEN�ե���������
				$hidden_vars = $this->af->getHiddenVars(NULL, array());
				$this->af->setAppNE('hidden_vars', $hidden_vars);
				return 'user_ec_order_delivery';
			}
			// ������Ͽ�Ѥߤν��������������
			else if ($this->af->get('user_order_delivery_type') == 1)
			{
				if ($r->get('user_name') == ""
					|| $r->get('user_name_kana') == ""
					|| $r->get('user_zipcode') == ""
					|| $r->get('region_id') == 0
					|| $r->get('user_address') == ""
					|| $r->get('user_phone') == "")
				{
					// HIDDEN�ե���������
					$hidden_vars = $this->af->getHiddenVars(NULL, array());
					$this->af->setAppNE('hidden_vars', $hidden_vars);
					return 'user_ec_delivery_edit';
				}
				else
				{
					// HIDDEN�ե���������
					$hidden_vars = $this->af->getHiddenVars(NULL, array());
					$this->af->setAppNE('hidden_vars', $hidden_vars);
					return 'user_ec_order_check';
				}
			}
		}
		return 'user_ec_order_check';
	}
}
?>