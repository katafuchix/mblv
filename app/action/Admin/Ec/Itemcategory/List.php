<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ƥ���ꥹ�ȥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryList extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_category_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_id' => array(
			'type'		=> VAR_TYPE_INT,
			//'form_type'	=> FORM_TYPE_TEXT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, shop',
		),
		'item_category_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'item_category_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ��Ͽ����
		'item_category_created_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_created_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_created_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'item_category_created_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_created_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_created_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'item_category_updated_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_updated_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_updated_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'item_category_updated_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_updated_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_updated_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ������
		'item_category_deleted_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_deleted_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_deleted_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'item_category_deleted_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_category_deleted_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_category_deleted_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		
		// �¤ӽ�
		'sort_key' => array(
			'name'		=> '�¤ӽ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('item_category_id_created_time'=>'��Ͽ����',
									 'item_category_id_updated_time'=>'��������',
									 'item_category_id_deleted_time'=>'�������',	),
		),
		'sort_order' => array(
			'name'		=> '���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('asc'=>'����',
									 'desc'=>'�߽�',),
		),
		
		// �¤ӽ�
		'sort_key' => array(
			'name'		=> '�¤ӽ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('user_created_time'=>'��Ͽ����',
									 'user_updated_time'=>'��������',
									 'user_deleted_time'=>'�������',	),
		),
		'sort_order' => array(
			'name'		=> '���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> array('asc'=>'����',
									 'desc'=>'�߽�',),
		),
		'search' => array(
		),
	);
}

/**
 * �������ƥ���ꥹ�ȥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryList extends Tv_ActionAdminOnly
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
		return 'admin_ec_itemcategory_list';
	}
}
?>