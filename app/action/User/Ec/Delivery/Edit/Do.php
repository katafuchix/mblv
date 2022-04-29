<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���������Խ��¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcDeliveryEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_name' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_name_kana' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_zipcode' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> 7,
			'max'			=> 7,
			'regexp'		=> '/^[0-9]+$/',
			'min_error' 	=> '{form}��Ⱦ�ѿ���7ʸ�������������Ϥ��Ƥ�������', 
			'max_error' 	=> '{form}��Ⱦ�ѿ���7ʸ�������������Ϥ��Ƥ�������', 
			'regexp_error'	=> '{form}��Ⱦ�ѿ���7ʸ�������������Ϥ��Ƥ�������', 
		),
		'region_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_address' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_phone' => array(
			'min'			=> 10,
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[0-9]+$/',
			'required_error'=> '{form}��Ⱦ�ѿ���10ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'		=> '{form}��Ⱦ�ѿ���10ʸ���ʾ�����������Ϥ��Ƥ�������',
			'regexp_error'	=> '{form}��Ⱦ�ѿ���10ʸ���ʾ�����������Ϥ��Ƥ�������',
		),

		'cart_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type' 		=> VAR_TYPE_INT,
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_type' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_card_number' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_month' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'user_order_card_year' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
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
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * �桼���������Խ��¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcDeliveryEditDo extends Tv_ActionUserOnly
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
		if ($this->af->validate() > 0) return 'user_ec_delivery_edit';
		
		// ���Ϥ��줿��������̤��ξ��
		if( date('Ymd') < sprintf("%04d%02d%02d", $this->af->get('user_birth_date_year'), $this->af->get('user_birth_date_month'), $this->af->get('user_birth_date_day')) ){
			$this->ae->add(null, '', E_USER_BIRTHDAY);
			return 'user_ec_delivery_edit';
		}
		
		// ��ťݥ����б�
		if(Ethna_Util::isDuplicatePost()) return 'user_ec_delivery_edit_done'; 
		
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
		
		// ����
		$usersess = $this->session->get('user');
		$u =& new Tv_User($this->backend, 'user_id', $usersess['user_id']);
		$u->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$u->set('user_updated_time', date('Y-m-d H:i:s'));
		// ����
		$u->update();
		
		// session�˥桼���������¸����
		$this->session->set('user', $u->getNameObject()); 
		
		// �����ȥϥå��夬̵���ͤϥ����ȥϥå����ȯ��
//		if(!$this->session->get('cart_hash')) $this->session->set('cart_hash', substr(md5(uniqid(rand(), true)), 0, 19));
		$cart_hash = $um->getUniqId();
		if(!$this->session->get('cart_hash')) $this->session->set('cart_hash', $cart_hash);
		
		$u->update();

		if ($this->af->get('user_order_type'))
		{
			return 'user_ec_order_check';
		}
		else
		{
			return 'user_ec_delivery_edit_done';
		}
	}
}
?>