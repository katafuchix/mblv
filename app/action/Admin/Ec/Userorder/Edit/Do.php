<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������ܺ��Խ��¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcUserorderEditDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'user_order_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'cart_hash' => array(
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_order_delivery_name'	=> array(
			'type'		=> VAR_TYPE_STRING,
		),
		'user_order_delivery_name_kana'	=> array(
			'type'				=> VAR_TYPE_STRING,
		),
		'user_order_delivery_zipcode'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_region_id'	=> array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_order_delivery_address'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_phone'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_type'	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'cancel_checkbox'	=> array(
			'name' 		=> '����󥻥�',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'cart_status'	=> array(
			'name'		=> '��ʸ���ơ�����',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, cart_status',
		),
		'cart_item_num'	=> array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'cart_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'slip_code' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'post_unit_group_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'post_unit_sent_status' => array(
			'type'		=> array(VAR_TYPE_INT),
		),
		'user_order_comment' => array(
			'name'		=> '������',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'user_order_no'	=> array(
		),
		'user_order_type'	=> array(
		),
		'user_order_use_point_status'	=> array(
		),
		'user_order_get_point'	=> array(
		),
		'user_order_card_revo_status' => array(
		),
		'user_order_card_cart_hash' => array(
		),
		'user_order_credit_auth_code' => array(
		),
		'user_order_conveni_cart_hash' => array(
		),
		'user_order_conveni_sale_code' => array(
		),
		'user_order_status'	=> array(
		),
		'user_order_created_time'	=> array(
		),
		'user_order_delivery_day'	=> array(
		),
		'user_order_delivery_note'	=> array(
		),
		'user_order_postage'	=> array(
		),
		'user_order_exchange_fee'	=> array(
		),
		'user_order_total_price1'	=> array(
		),
		'user_order_total_price2'	=> array(
		),
		'user_mailaddress'	=> array(
		),
		'user_address'	=> array(
		),
		'user_phone'	=> array(
		),
		'item_id'	=> array(
		),
		'item_name'	=> array(
		),
		'item_type'	=> array(
		),
		'item_price'	=> array(
		),
		'post_unit_sent_flag'	=> array(
		),
		'post_unit_item_num'	=> array(
		),
	);
}

/**
 * �������������ܺ��Խ��¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcUserorderEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_ec_userorder_edit';
		
		// ��ťݥ����б�
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_userorder_list';
		
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
		
		//db
		$db = $this->backend->getDB();
		$this->cart_hash = $this->af->get('cart_hash');
		
		//����ʸ�Ծ��� start
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		//$o->importForm(OBJECT_IMPORT_IGNORE_NULL);//cart_id.array��error�Τ��ᡣ
		
		// ���ʤ��Ϥ��褬�ֻ���פǤ��Ϥ�����󤬶��ξ��
		if($o->get('user_order_delivery_type') == 2
			&&
			($this->af->get('user_order_delivery_name') == ""
				|| $this->af->get('user_order_delivery_region_id') == ""
				|| $this->af->get('user_order_delivery_address') == ""
				|| $this->af->get('user_order_delivery_zipcode') == ""
			)
		) {
			// ���顼ɽ��
			$this->ae->add(null, '', E_ADMIN_USER_ORDER_DELIVERY_TYPE);
			return 'admin_ec_userorder_edit';
		}
		
		// ���Ϥ����̾�����äƤ��ʤ����Ͼ��ʤ��Ϥ����ֻ��꽻��פ��ѹ�
		if($this->af->get('user_order_delivery_name')){
			$o->set('user_order_delivery_type', 2);
		}
		
		$o->set('user_order_delivery_name', 			$this->af->get('user_order_delivery_name'));
		$o->set('user_order_delivery_zipcode', 			$this->af->get('user_order_delivery_zipcode'));
		$o->set('user_order_delivery_region_id', 			$this->af->get('user_order_delivery_region_id'));
		$o->set('user_order_delivery_address', 			$this->af->get('user_order_delivery_address'));
		$o->set('user_order_delivery_address_building', $this->af->get('user_order_delivery_address_building'));
		$o->set('user_order_delivery_phone', 			$this->af->get('user_order_delivery_phone'));
		$o->set('user_order_updated_time',				date("Y-m-d H:i:s"));
		$o->set('user_order_comment',					$this->af->get('user_order_comment'));
		$o->update();
		//����ʸ�Ծ��� end
		
		
		//��ʸ������ 1:���쥸�å�,2:����ӥ�,3:���,4:��Կ���
		$this->order_type 		= $o->get('user_order_type');
		//�ݥ���Ȥ���Ѥ��뤫
		$this->use_point_flag 	= $o->get('user_order_use_point_status');
		//���Ѥ���ݥ����
		$this->use_point 		= $o->get('user_order_use_point');
		
		//����ʸ����������ʸ���ơ����� start
		// 0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�
		$cart_status_name = array(0 => '̤���', 1 => '��ʸ��', 2 => '��Ѻ�', 4 => '���ʺ�', 5 => '����󥻥�',);
//		$um = $this->backend->getManager('Util');
//		$cart_status_name = $um->getAttrList('cart_status');
		if($this->af->get('cart_status')){
			foreach($this->af->get('cart_status') as $this->cart_id => $new_cart_status){
				//�����Ⱦ������
				$o =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
				$this->user_id 	= $o->get('user_id');
				$this->cart_item_num = $o->get('cart_item_num');
				$this->item_id 	= $o->get('item_id');
				// �桼������μ���
				$u =& new Tv_User($this->backend, 'user_id', $this->user_id);
				$this->user_point 		= $u->get('user_point');
				$this->user_mailaddress = $u->get('user_mailaddress');
				$this->user_name 		= $u->get('user_name');
				$this->region_id 		= $u->get('region_id');
				
				//���Ǥ˻���Υ��ơ������ʤ鹹�����ʤ�
				$old_cart_status = $o->get('cart_status');
				if($old_cart_status == $new_cart_status) continue;
				
				//�쥹�ơ����������ʺѤߤξ��ϥ��ơ������ѹ��ϤǤ��ʤ�
				if($old_cart_status == 4){
					$this->ae->add(null, '', E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN);
					continue;
				}
				//�쥹�ơ�����������󥻥�ξ��ϥ��ơ������ѹ��ϤǤ��ʤ�
				if($old_cart_status == 5){
					$this->ae->add(null, '', E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL);
					continue;
				}
				
				//̤���
				if($new_cart_status == 0){
				}
				//��ʸ�Ѥ�
				elseif($new_cart_status == 1){
				}
				//��ѺѤ�
				elseif($new_cart_status == 2){
				}
				//���ʺѤߡ������Ȥ����ʺѤߤˤ���
				elseif($new_cart_status == 4){
					$res = $this->cart_status_update($new_cart_status);
				}
				//����󥻥�
				elseif($new_cart_status == 5){
					$res = $this->cart_status_update($new_cart_status);
				}
				
				//���̽��� ���ơ���������
				$o =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
				$o->set('cart_status', $new_cart_status);
				$o->set('cart_updated_time', date('Y-m-d H:i:s'));
				$o->update();
				
				// �����Ծ���
				$admin = $this->session->get('admin');
				
				// �������������
				$och =& new Tv_UserOrderHist($this->backend);
				$och->set('user_order_id', $this->af->get('user_order_id'));
				$och->set('cart_id', $this->cart_id);
				$och->set('cart_item_num', $this->cart_item_num);
				$och->set('cart_status', $new_cart_status);
				$och->set('user_order_hist_user', $admin['admin_id']);
				$och->set('user_order_hist_created_time', date('Y-m-d H:i:s'));
				$och->set('user_order_hist_updated_time', date('Y-m-d H:i:s'));
				$och->add();
				
				$this->ae->add('errors',"�������ֹ��".$this->cart_id."�פ򹹿����ޤ�����$cart_status_name[$old_cart_status] -> $cart_status_name[$new_cart_status]");
			}
		}
		//����ʸ����������ʸ���ơ����� end
		
		
		
		//����ʸ�������ƿ��� start
		//����
		foreach($this->af->get('cart_id') as $k => $v){
			$cart_item_num = $this->af->get('cart_item_num');
			$cart[$v] = $cart_item_num[$k];
		}
		
		//�����ȹ������� , ȯ��ñ�̹�������
		foreach($cart as $cart_id => $cart_item_num){
			//�����ȹ�������
			$o =& new Tv_Cart($this->backend, 'cart_id', $cart_id);
			//���ʺѤߤξ��
			if($o->get('cart_status') == 4) continue;
			//����󥻥�Ѥߤξ��
			if($o->get('cart_status') == 5) continue;
			//�Ŀ����ѹ����ʤ��ʤ鹹�����ʤ�
			$old_cart_item_num = $o->get('cart_item_num');
			
			/////////////////
			//�Ŀ��û��ξ��/
			/////////////////
			if($old_cart_item_num < $cart_item_num){
				$this->ae->add(null, '', E_ADMIN_CART_ITEM_NUM_SUBTRACTION);
				return 'admin_ec_userorder_edit';
			}
			/////////////////////
			//�Ŀ��ѹ��ʤ��ξ��/
			/////////////////////
			elseif($old_cart_item_num == $cart_item_num) continue;
			
			/////////////////////
			//�Ŀ������ξ��/
			/////////////////////
			else{
				//�Ŀ��򹹿�
				$o->set('cart_item_num', $cart_item_num);
				$res = $o->update();
				if(Ethna::isError($res)) return 'admin_error';
				$this->ae->add('errors',"�������ֹ��".$cart_id."�פ򹹿����ޤ�����$old_cart_item_num -> $cart_item_num ��");
				
				//�߸�Ĵ������
				$num = $old_cart_item_num - $cart_item_num;
				$s =& new Tv_Stock($this->backend, 'stock_id', $o->get('stock_id'));
				$s->set('stock_num', $s->get('stock_num') + $num);
				$r = $s->update();
				if(Ethna::isError($r)) return 'master_error';
				
				// �������������
				$och =& new Tv_UserOrderHist($this->backend);
				$och->set('user_order_id', $this->af->get('user_order_id'));
				$och->set('cart_id', $cart_id);
				$och->set('cart_item_num', $cart_item_num);
				$och->set('cart_status', $o->get('cart_status'));
				$och->set('user_order_hist_user', $this->session->get('admin_id'));
				$och->set('user_order_hist_created_time', date('Y-m-d H:i:s'));
				$och->set('user_order_hist_updated_time', date('Y-m-d H:i:s'));
				$och->add();
				
				//ȯ��ñ�̹�������
				//cart_id��post_unit��select���ơ���̷�������ʤ顢����post_unit_item_num��form�ͤǹ�������
				//cart_id��post_unit��select���ơ���̷����ʣ����ʤ顢���η��������������form�ͤˤʤ�褦����������򷫤��֤�
				$sql = "select count(post_unit_id)as cnt from post_unit where cart_id = ?";
				$rows = $db->db->getAll($sql, array($cart_id), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				//��̷�������ʤ�
				if($rows[0]['cnt'] == 1){
					$updateValues = array(
						'post_unit_item_num' => $cart_item_num,
						'post_unit_updated_time' => date('Y-m-d H:i:s'),
					);
					$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, " cart_id = $cart_id ");
					if (Ethna::isError($res)) return 'admin_error';
					$this->ae->add(null, '', I_ADMIN_POST_UNIT_EDIT_DONE);
				}
				//��̷����ʣ����ʤ�
				elseif($rows[0]['cnt'] > 1){
					//�����form�ͤˤʤ�褦����������򷫤��֤�
					$cnt = $rows[0]['cnt'] - $cart_item_num;
					for($i=0;$i<$cnt;$i++){
						$updateValues = array(
							'post_unit_item_num' => '0',
							'post_unit_status' => '0',
							'post_unit_updated_time' => date('Y-m-d H:i:s'),
							'post_unit_deleted_time' => date('Y-m-d H:i:s'),
						);
						$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_id = $cart_id limit 1");
						if(Ethna::isError($res)) return 'admin_error';
					}
				}
				
				//��������Ȥ�0�ˤʤ�ʤ顢�������������פʤɤ�0�ˤ���
				$sql = 'select max(cart_item_num)as cart_item_num_max from cart where cart_hash = ?';
				$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				if($rows[0]['cart_item_num_max'] == 0) $order_zero_flag = true;
			}
		}
		//����ʸ�������ƿ��� end
		
		
		//ȯ������ start
		if(is_array($this->af->get('post_unit_group_id'))){
			foreach($this->af->get('post_unit_group_id') as $k => $this->group_id){
				//������ɼ������start
				$slip = $this->af->get('slip_code');
				$slip_code = $slip[$k];
				$updateValues = array(
					'slip_code' => $slip_code,
					'post_unit_updated_time' => date('Y-m-d H:i:s'),
				);
				$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "post_unit_group_id = $this->group_id and cart_hash = '$this->cart_hash'");
				if(Ethna::isError($res)) return 'admin_error';
				//������ɼ������end
				
				//����ȯ�����ơ�����start
				//���ߤ�ȯ�����ơ����������
				$sql = "select post_unit_sent_status from post_unit where cart_hash = ? and post_unit_group_id = $this->group_id limit 1";
				$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				$old_status = $rows[0]['post_unit_sent_status'];
				
				//ȯ�����ơ������ѹ��ʤ�й�������
				$this->post_sent_flag = $this->af->get('post_unit_sent_status');
				if($this->post_sent_flag[$this->group_id] != $old_status){
					//����
					$updateValues = array(
						'post_unit_sent_status' => $this->post_sent_flag[$this->group_id],
						'post_unit_updated_time' => date('Y-m-d H:i:s'),
					);
					$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and post_unit_group_id = $this->group_id");
					if(Ethna::isError($res)) return 'admin_error';
					
					//��ȯ���Ѥߡפع�����������ʸ�Ԥȴ����Ԥإ᡼�뤹��
					if($this->post_sent_flag[$this->group_id] == 1){
						//���ߤΥ᡼���������ơ����������
						$sql = "select post_unit_mail_sent_status from post_unit where cart_hash = ? and post_unit_group_id = $this->group_id limit 1";
						$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
						if (Ethna::isError($rows)) return 'admin_error';
						$old_status = $rows[0]['post_unit_mail_sent_status'];
						//̤�����ʤ�᡼�������
						if($old_status != 1){
						//	$this->post_mail_sent();
						}
							
						//�в�������Ͽ
						$updateValues = array(
							'post_unit_sent_date' => date('Y-m-d H:i:s'),
							'post_unit_updated_time' => date('Y-m-d H:i:s'),
						);
						$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and post_unit_group_id = $this->group_id");
						if(Ethna::isError($res)) return 'admin_error';
						
						//��ӥ塼��Ͽ
						$sql = "select cart_id, item_id from post_unit where cart_hash = ? and post_unit_group_id = ?";
						$rows = $db->db->getAll($sql, array($this->cart_hash, $this->group_id), DB_FETCHMODE_ASSOC);
						if (Ethna::isError($rows)) return 'admin_error';
						if($rows){
							foreach($rows as $k => $v){
								// ���ˤ��Υ�����ID�ȥ桼��ID���Ф��ƥ�ӥ塼��ƿ��������뤫�ɤ�����ǧ����
								$review =& new Tv_Review($this->backend, array('cart_id', 'user_id'), array($v['cart_id'], $this->user_id));
								if(!$review->isValid()){
									$review =& new Tv_Review($this->backend);
									$review->set('cart_id', $v['cart_id']);
									$review->set('user_id', $this->user_id);
									$review->set('item_id', $v['item_id']);
									$review->set('review_status', 1);
									$review->set('review_hash', $um->getUniqId());
									$review->set('review_created_time', date('Y-m-d H:i:s'));
									$review->set('review_updated_time', date('Y-m-d H:i:s'));
									$r = $review->add();
									if(Ethna::isError($r)) return 'admin_error';
								}
							}
						}
					}
				}
				//����ȯ�����ơ�����end
			}
		}
		//ȯ������ end
		
		//¾��ȯ������٤����ʤ��ʤ��ʤä���硢�ݥ���Ȥ���Ϳ����
		$added =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		if($added->get('user_order_point_added_status') != 1){
			//post_unit ��cart_hash,postsent_falg�Ǹ���
			$sql = "select count(post_unit_id)as cnt from post_unit where cart_hash = ? and post_unit_sent_status = 0";
			$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
			if (Ethna::isError($rows)) return 'admin_error';
			$cnt = $rows[0]['cnt'];
			if($cnt == 0){
				/* =============================================
				// �ݥ�����ɲ÷Ͻ���(�ݥ������Ϳ����ơ��֥�˺���Υݥ������Ϳ������Ͽ
				 ============================================= */
				//��Ϳ����ݥ���Ȥ����
				$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
				
				$get_point = $order->get('user_order_get_point');
				
				$pm = $this->backend->getManager('Point');
				$point_type_search = $this->config->get('point_type_search');
				$param = array(
					'user_id'			=> $this->user_id,
					'point'				=> $get_point,
					'point_type'		=> $point_type_search['order'],
					'point_memo'		=> 'ORDER',
				);
				$pm->addPoint($param);
				
				//��ʸ�ơ��֥�Υݥ������Ϳ�������˸�����������Ͽ����
				$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
				$o->set('user_order_get_point_date', date('Y-m-d H:i:s'));
				$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				if(Ethna::isError($r)) return 'admin_error';
				
				//�ݥ������Ϳ�����ե饰��ON
			//	$added->set('point_added_flag', '1');
			//	$r = $added->update();
			//	if(Ethna::isError($r)) return 'master_error';
				
			}
		}
		//////////////////////////////////////////////////////////////////////
		//�����ȸĿ��򸺻�������������׻���Ԥ� �������� ɬ���Ʒ׻���Ԥ�//
		//////////////////////////////////////////////////////////////////////
		//����
		$c = $this->backend->getManager('Cart');
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		
		//�㤤ʪ��������
		$cart_list = $c->getCartList($this->cart_hash);
		if(count($cart_list) == 0){
			// �ե������ͤΥ��ꥢ
			$this->af->clearFormVars();
			return 'admin_ec_userorder_list';
		}
		// �㤤ʪ��׶�ۤν����
		$new_total_price1 = 0;
		// �����ݥ���Ȥν����
		$get_point = 0;
		// �㤤ʪ������׾��ʸĿ��ν����
		$total_num = 0;
		// ���٤Ƥ��㤤ʪ�����쥳���ɤ��Ф��ƽ�������
		foreach($cart_list as $k => $v){
			// �㤤ʪ�����쥳���ɤξ��פ�׻�����
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// ������ȴ���ι�׶�ۤ�û�����
			$new_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// ��׾��ʸĿ���û�����
			$total_num += $v['cart_item_num'];
			// �ݥ���ȷ׻�
			$get_point += $v['item_point'] * $v['cart_item_num'];
			// ȯ��ñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ���ȥå��ʥ����ס�IDñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			//�͵����ʤλ����Ѥ˹������add���뤿�������˳�Ǽ
			$ranking_item_detail[$k]['item_id'] = $v['item_id'];
			$ranking_item_detail[$k]['stock_id'] = $v['stock_id'];
			$ranking_item_detail[$k]['ranking_order_cart_item_num'] = $v['cart_item_num'];
		}
		$o->set('user_order_total_price1', $new_total_price1);//����
		
		/**
		 * �����Ǥη׻�
		 */
		$new_tax = floor($new_total_price1/21);
		$o->set('user_order_tax', $new_tax);
		
		/*
		 * ����
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����
		 */
		$new_postage = 0;
		// �����桼������ƻ�ܸ�
		$region_id = $this->region_id;
		// ����¾����������ξ��ϡ����������ƻ�ܸ��˾��
		if($this->af->get('user_order_delivery_type') == 2) $region_id = $this->af->get('user_order_delivery_region_id');
		// ���������
		$new_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $region_id);
		$o->set('user_order_postage', $new_postage);
		
		/*
		 * ����������
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����������
		 */
		$new_exchange_fee = 0;
		if($this->order_type == 3){
			$new_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$o->set('user_order_exchange_fee', $new_exchange_fee);
		
		/*
		 * �ݥ���ȷ׻�
		 */
		//����ݥ���Ȥ�����
		$new_expend_point = 0;
		if($this->use_point_flag == 1) $new_expend_point = $this->use_point;
		// ���ʾ��� < ���Ѥ���ݥ���Ȥξ���Ĵ��
		$rest_point = 0;
		if($new_total_price1 < $new_expend_point){
			$rest_point = $new_expend_point - $new_total_price1;//�ݥ���Ȥ�;��
			$new_expend_point = $new_total_price1;
			//�ݥ���Ȥ�;���桼�����֤�
			/* ========================================================================
			// �ݥ�����ɲ÷Ͻ���(�ݥ������Ϳ����ơ��֥�˺���Υݥ������Ϳ������Ͽ
			 ========================================================================== */
			//��Ϳ����ݥ���Ȥ����
			$get_point = $rest_point;
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'			=> $this->user_id,
				'point'				=> $get_point,
				'point_type'		=> $point_type_search['admin'],
				'point_memo'		=> 'ADMIN',
			);
			$pm->addPoint($param);
			$this->ae->add('errors', '���ѥݥ����('.$this->use_point.')�����ʹ��('.$new_total_price1.')��Ķ�������ᡢ�ݥ����Ĵ�����ޤ�����');
			$this->ae->add('errors', '�����ѥݥ���Ȥ�'.$new_expend_point.'���ѹ����ޤ������桼����'.$rest_point.'��ݥ�����ִԤ��ޤ�����');
		}
		$o->set('user_order_use_point', $new_expend_point);
		
		/*
		 * ��׶��
		 */
		$new_total_price2 = $new_total_price1 - $new_expend_point + $new_postage + $new_exchange_fee;
		$o->set('user_order_total_price2', $new_total_price2);
		
		//����
		$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
		$o->update();
		
		//�������椹�٤�0�ˤʤä��Τǡ��������������������ʾ��ס����ʹ�ס������ݥ���Ȥ�0�ߤ�
		if($order_zero_flag == true){
			$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
			$order->set('user_order_get_point', '0');
			$order->set('user_order_total_price1', '0');
			$order->set('user_order_total_price2', '0');
			$order->set('user_order_tax', '0');
			$order->set('user_order_postage', '0');
			$order->set('user_order_exchange_fee', '0');
			$order->set('user_order_updated_time', date('Y-m-d H:i:s'));
			$r = $order->update();
			if(Ethna::isError($r)) return 'admin_error';
			$this->ae->add(null, '', I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY);
		}
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_USER_ORDER_EDIT_DONE);
		
		return 'admin_ec_userorder_list';
	}
	
	//��ʸ�Ԥء־��ʤ�ȯ�����ޤ����ץ᡼�������
	function post_mail_sent()
	{
		//����
		$db = $this->backend->getDB();
		
		//���뾦�ʤϲ���
		$values = array($this->cart_hash, $this->group_id);
		$sql = "select * from post_unit where cart_hash = ? and group_id = ? ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$i=0;
		foreach($rows as $k => $v){
			$post_list[$i]['item_id'] = $v['item_id'];
			$post_list[$i]['stock_id'] = $v['stock_id'];
			$post_list[$i]['post_unit_item_num'] = $v['post_unit_item_num'];
			//item_name����
			$item =& new Tv_Item($this->backend, 'item_id', $v['item_id']);
			$post_list[$i]['item_name'] = $item->get('item_name');
			$post_list[$i]['item_price'] = $item->get('item_price');
			//item_type,one_type_only_flag����
			$stock =& new Tv_Stock($this->backend, 'stock_id', $v['stock_id']);
			$post_list[$i]['item_type'] = $stock->get('item_type');
			$post_list[$i]['stock_one_type_status'] = $stock->get('stock_one_type_status');
			$i++;
		}
		
		//�����Ⱦ������
		$values = array($this->cart_hash);
		$sql = "SELECT * FROM cart c,item i,stock s  WHERE c.cart_hash = ? AND c.stock_id = s.stock_id AND s.item_id = i.item_id ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$cart_list = $rows;
		
		//��������������
		$sql = "SELECT s.supplier_shipping_type, s.supplier_name FROM supplier s, item i WHERE item_id = ? AND i.supplier_id = s.supplier_id";
		$rows = $db->db->getAll($sql, array($cart_list[0]['item_id']), DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$supplier_shipping_type = $rows[0]['supplier_shipping_type'];
		$supplier_name = $rows[0]['supplier_name'];
		
		//���������������
		$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
		
		//������ɼ�����ɼ���
		$values = array($this->cart_hash);
		$sql = "select slip_code from post_unit where cart_hash = ? and post_unit_status = 1 and post_unit_group_id = $this->group_id limit 1";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$slip_code_list = $rows;
		
		// ȯ���Ѥߥ᡼������
		$mail_values = array(
			// �����ԥ��ɥ쥹
			'adminMailaddress' => $this->config->get('adminMailaddress'),
			//cart_list
			'cart_list' => $cart_list,
			//post_list
			'post_list' => $post_list,
			//slip_code_list
			'slip_code_list' => $slip_code_list,
			//�桼��̾
			'user_name' => $this->user_name,
			//ȯ����
			'sent_date' => date("Y-m-d H:i:s", time()),
			'total_price1' 	=> $order->get('total_price1'),
			'postage' 		=> $order->get('postage'),
			'exchange_fee' 	=> $order->get('exchange_fee'),
			'tax' 			=> $order->get('tax'),
			'use_point' 	=> $order->get('use_point'),
			'total_price2' 	=> $order->get('total_price2'),
			'supplier_shipping_type' => $supplier_shipping_type,
			'supplier_name' => $supplier_name,
		);
		
		// �桼��������
		$ms = new Tv_Mail($this->backend);
		$ms->sendOne($this->user_mailaddress, "item_send{$supplier_shipping_type}" , $mail_values );
		// �����Ԥ�����
		$ms->sendOne($this->config->get('user_order_copy_mailaddress'), "item_send{$supplier_shipping_type}" , $mail_values );
		
		$this->ae->add(null, '', I_ADMIN_POST_UNIT_MAIL_SENT_DONE);
		
		//�־���ȯ�����ޤ����ץ᡼������ä���post_mail_sent_status��1�˹�������
		$updateValues = array(
			'post_unit_sent_status' => 1,
			'post_unit_updated_time' => date('Y-m-d H:i:s'),
		);
		$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and group_id = $this->group_id");
		if(Ethna::isError($res)) return 'admin_error';
	}
	
	//�����ȥ��ơ������򹹿�����
	// 0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�
	function cart_status_update($cart_status)
	{
		//db
		$db = $this->backend->getDB();
		
		// ��������������������
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		$use_point = $o->get('user_order_use_point');//���ѥݥ����
		$get_point = $o->get('user_order_get_point');//�����ݥ����
		$point_added_flag = $o->get('user_order_point_added_status');//1:�ݥ������Ϳ��λ
		
		// ��ӥ塼����Υ��ơ�������̵����
		$res = $db->db->autoExecute('review', array('review_status' => 0), DB_AUTOQUERY_UPDATE,"cart_id = " . $this->cart_id);
		if(Ethna::isError($res)) exit;
		
		//�㤤ʪ��������󥻥�
		$c =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
		$cart_item_num = $c->get('cart_item_num');
		$c->set('cart_status', 5);//5:�㤤ʪ��������󥻥�
		$c->set('cart_item_num', 0);
		$c->set('cart_updated_time', date('Y-m-d H:i:s'));
		$r = $c->update();
		
		if(Ethna::isError($r)) exit;
		
		//����󥻥�ʤ�߸˿����ɤ�
		if($cart_status == 5){
			//�߸˥���󥻥�(�߸ˤ˺���θĿ����᤹)
			$s =& new Tv_Stock($this->backend, 'stock_id', $c->get('stock_id'));
			$s->set('stock_num', $s->get('stock_num') + $cart_item_num);
			$s->set('stock_updated_time', date('Y-m-d H:i:s'));
			$r = $s->update();
			if(Ethna::isError($r)) exit;
		}
		
		//ȯ������ơ��֥빹���ʾ��ʸĿ���0�ˤ����
		$res = $db->db->autoExecute('post_unit', array('post_unit_item_num' => 0, 'post_unit_updated_time' => 'now()'), DB_AUTOQUERY_UPDATE,"cart_id = " . $this->cart_id);
		if(Ethna::isError($res)) exit;
		
		//��ۺƷ׻���Ԥ�
		//����
		$um = $this->backend->getManager('Util');
		$c = $this->backend->getManager('Cart');
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		
		//�㤤ʪ��������
		$cart_list = $c->getCartList($this->cart_hash);
		if(count($cart_list) == 0){
			$this->ae->add(null, '', I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY);
			$o->set('user_order_get_point', '0');
			$o->set('user_order_total_price1', 0);
			$o->set('user_order_total_price2', 0);
			$o->set('user_order_tax', 0);
			$o->set('user_order_postage', 0);
			$o->set('user_order_exchange_fee', 0);
			$o->set('user_order_use_point', 0);
			$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
			//$o->update();
			
			/*
			 * �ݥ���ȷ׻�
			 */
			//����ݥ���Ȥ�����
			$new_expend_point = 0;
			if($this->use_point_flag == 1) $new_expend_point = $this->use_point;
			// ���ʾ��� < ���Ѥ���ݥ���Ȥξ���Ĵ��
			$rest_point = 0;
			if(0 < $new_expend_point){
				$rest_point = $new_expend_point;//�ݥ���Ȥ�;��
				$new_expend_point = 0;
				
				//�ݥ���Ȥ�;���桼�����֤�
				// ========================================================================
				// �ݥ�����ɲ÷Ͻ���(�ݥ������Ϳ����ơ��֥�˺���Υݥ������Ϳ������Ͽ
				// ========================================================================== 
				//��Ϳ����ݥ���Ȥ����
				
				//�ݥ������Ϳ�Ѥߤʤ�С����Υݥ���Ȥ��֤��Ƥ�餦
				if($point_added_flag){
					$add_point = $rest_point - $get_point;
				}else{
					$add_point = $rest_point;
				}
				$pm = $this->backend->getManager('Point');
				$point_type_search = $this->config->get('point_type_search');
				$param = array(
					'user_id'			=> $this->user_id,
					'point'				=> $add_point,
					'point_type'		=> $point_type_search['admin'],
					'point_memo'		=> 'ADMIN',
				);
				$pm->addPoint($param);
				$this->ae->add('errors', '���ѥݥ����('.$this->use_point.')�����ʹ��(0)��Ķ��������ݥ����Ĵ�����ޤ��������ѥݥ���Ȥ�('.$new_expend_point.')���ѹ����桼���ݥ���Ȥ�Ĵ��('.$add_point.')');
			}
			
			$o->set('user_order_use_point', $new_expend_point);
			$o->update();
		}
		// �㤤ʪ��׶�ۤν����
		$new_total_price1 = 0;
		// �����ݥ���Ȥν����
		$get_point = 0;
		// �㤤ʪ������׾��ʸĿ��ν����
		$total_num = 0;
		// ���٤Ƥ��㤤ʪ�����쥳���ɤ��Ф��ƽ�������
		foreach($cart_list as $k => $v){
			// �㤤ʪ�����쥳���ɤξ��פ�׻�����
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// ������ȴ���ι�׶�ۤ�û�����
			$new_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// ��׾��ʸĿ���û�����
			$total_num += $v['cart_item_num'];
			// �ݥ���ȷ׻�
			$get_point += $v['item_point'] * $v['cart_item_num'];
			// ȯ��ñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ���ȥå��ʥ����ס�IDñ�̤��ȤΡ����ʣɣĤȤ��β��ʡ��Ŀ��Υꥹ��
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			//�͵����ʤλ����Ѥ˹������add���뤿�������˳�Ǽ
			$ranking_item_detail[$k]['item_id'] = $v['item_id'];
			$ranking_item_detail[$k]['stock_id'] = $v['stock_id'];
			$ranking_item_detail[$k]['ranking_order_item_num'] = $v['cart_item_num'];
		}
		$o->set('user_order_total_price1', $new_total_price1);//����
		
		/**
		 * �����Ǥη׻�
		 */
		$new_tax = floor($new_total_price1/21);
		$o->set('user_order_tax', $new_tax);
		
		/*
		 * ����
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����
		 */
		$new_postage = 0;
		// �����桼������ƻ�ܸ�
		$region_id = $this->region_id;
		// ����¾����������ξ��ϡ����������ƻ�ܸ��˾��
		if($this->af->get('user_order_delivery_type') == 2) $region_id = $this->af->get('user_order_delivery_region_id');
		// ���������
		$new_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $region_id);
		$o->set('user_order_postage', $new_postage);
		
		/*
		 * ����������
		 * @param array $cart_list ���ʾ���ꥹ��
		 * @return integer ����������
		 */
		$new_exchange_fee = 0;
		if($this->order_type == 3){
			$new_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$o->set('user_order_exchange_fee', $new_exchange_fee);
		
		/*
		 * ��׶��
		 */
		$new_total_price2 = $new_total_price1 - $new_expend_point + $new_postage + $new_exchange_fee;
		$o->set('user_order_total_price2', $new_total_price2);
		
		//����
		$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
		$o->update();
	}
}
?>