<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������ꥹ�ȥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcUserorderList extends Tv_ActionForm
{
	var $form = array(
		'user_order_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_order_no' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'cart_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_order_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		// ��Ͽ����
		'user_order_created_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_created_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_created_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_order_created_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_created_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_created_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'user_order_updated_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_updated_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_updated_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_order_updated_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_updated_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_updated_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �������
		'user_order_deleted_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_deleted_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_deleted_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_order_deleted_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_order_deleted_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_order_deleted_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		
		// ����̾
		'item_name' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// �桼����̾
		'user_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// ��ʧ��ˡ 1:���쥸�å�, 2:����ӥ�, 3:�����, 4:��Կ���
		'user_order_type' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_order_type',
		),
		// cart_status 0:̤���,1:��ʸ��,2:��Ѻ�,4:���ʺ�,5:����󥻥�
		'cart_status' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, cart_status',
		),
		// �¤ӽ�
		'sort_key' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('user_created_time'=>'��Ͽ����',
									 'user_updated_time'=>'��������',
									 'user_deleted_time'=>'�������',	),
		),
		'sort_order' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('asc'=>'����',
									 'desc'=>'�߽�',),
		),
		'search' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'download' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * �������������ꥹ�ȥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcUserorderList extends Tv_ActionAdminOnly
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
		return 'admin_ec_userorder_list';
	}
}
?>