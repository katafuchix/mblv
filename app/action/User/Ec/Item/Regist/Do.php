<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �㤤ʪ�����ؤξ�����Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemRegistDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'item_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'stock_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
		),
		'cart_item_num' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �㤤ʪ�����ؤξ�����Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemRegistDo extends Tv_ActionUser
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
		$um = $this->backend->getManager('Util');
		
		// [TODO:��ťݥ��ȶػ߽���]�ѥ�᥿�����
		$cart_hash = $this->session->get('cart_hash');
		$stock_id = $this->af->get('stock_id');
		$cart_item_num = $this->af->get('cart_item_num');
		$item_id = $this->af->get('item_id');
		
		// ����
		$db = $this->backend->getDB();
		$old_cart_item_num = 0;
		
		// ���󤫤�������뾦�ʤ�DB�Ŀ�0�ξ��
		$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
		if($s->get('stock_num') == 0){
			$this->ae->add(null, '', E_USER_STOCK_OUT);
			return 'user_ec_item';
		}
		
		// ���󤫤�������뾦�ʤθĿ���DB�߸ˤ��¿�����
		$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
		if($s->get('stock_num') < $cart_item_num){
			$this->ae->add(null, '', E_USER_STOCK_OVER);
			return 'user_ec_item';
		}
		
		// �����ȥϥå��夬̵�����ϡ������ȥϥå���ȯ��
		if(!$cart_hash){
			// �����ȥϥå��������
			$cart_hash = $um->getUniqId();
			
			// ���å���󳫻�
			$this->session->start();
			$this->session->set('cart_hash',$cart_hash);
		}
		// �����ȥϥå��夬������
		else{
			// �㤤ʪ��������˺�����������Ƥ������ʤ����뤫�ɤ��������
			$c = new Tv_Cart($this->backend);
			$rows = $c->searchProp(
				array('cart_id', 'cart_item_num'),
				array('cart_hash' => $cart_hash, 'stock_id' => $stock_id)
			);
			if (Ethna::isError($rows)) return 'user_ec_item';
			$cart_id = $rows[1][0]['cart_id'];
			$old_cart_item_num = $rows[1][0]['cart_item_num'];
		}
		
		// �����ξ��ʤξ��
		$timestamp = date("Y-m-d H:i:s");
		if(!$old_cart_item_num){
			
			//Ʊ���Բĥ����å�
			$o =& new Tv_Item($this->backend, 'item_id', $this->af->get('item_id'));
			if($o->get('item_bundle_status')){
				$this->ae->add(null, '', E_USER_ITEM_BUNDLE_STATUS);
			}
			
			// �����ƥ���㤤ʪ�������ɲ�
			$c = new Tv_Cart($this->backend);
			$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$c->set('cart_hash', $cart_hash);
			$c->set('cart_status', 0);
			$c->set('cart_created_time', $timestamp);
			$r = $c->add();
			if(Ethna::isError($r)) return 'user_ec_item';
			
			//�㤤ʪ�����ڡ����ǡ��㤤ʪ��³����ץ���å������������������ܸ���������Ƥ���
			$back_url_set = true;
		}
		// �ɲþ��ʤξ��
		else{
			/*
			 * �����ʤ������㤤ʪ�����˳�Ǽ�Ǥ������Ŀ����ǧ����
			 */
			if($cart_item_num + $old_cart_item_num > 9){
				$this->ae->add(null, '', E_USER_CART_ITEM_NUM);
				return 'user_ec_item';
			}
			//������ɲøĿ��Ǻ߸˿�����äƤ��ʤ���Ƚ�Ǥ���
			$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
			if($cart_item_num + $old_cart_item_num > $s->get('stock_num')){
				$this->ae->add(null, '', E_USER_STOCK_OVER);
				return 'user_ec_item';
			}
			
			//Ʊ���Բĥ����å�
			$o =& new Tv_Item($this->backend, 'item_id', $this->af->get('item_id'));
			if($o->get('item_bundle_status')){
				$this->ae->add(null, '', E_USER_ITEM_BUNDLE_STATUS);
			}
			
			
			// �㤤ʪ�����Υ����ƥ���򹹿�
			$c = new Tv_Cart($this->backend, 'cart_id', $cart_id);
			$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$c->set('cart_item_num', $cart_item_num + $old_cart_item_num);
			$c->set('cart_updated_time', $timestamp);
			$r = $c->update();
			if(Ethna::isError($r)) return 'user_ec_item';
			
			//�㤤ʪ�����ڡ����ǡ��㤤ʪ��³����ץ���å������������������ܸ���������Ƥ���
			$back_url_set = true;
		}
		
		if($back_url_set){
			//�㤤ʪ�����ڡ����ǡ��㤤ʪ��³����ץ���å������������������ܸ���������Ƥ���
			//ľ���ˤ�������åפ�ľ���Υ��ƥ���ؤ�ɤ�����
			$o =& new Tv_Item($this->backend, 'item_id', $item_id);
			$item_category_id_list = explode(',', $o->get('item_category_id'));
			$back_url = array('shop_id' => $o->get('shop_id'), 'item_category_id' => $item_category_id_list[0]);
			$this->session->set('back_url', $back_url);
		}
		
		return 'user_ec_cart';
	}
}
?>