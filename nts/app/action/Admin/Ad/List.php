<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ��������������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdList extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'ad_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_url_d' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_url_a' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_url_s' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_code_id' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'name'		=> '���𥳡���',
		),
		'ad_image' => array(
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'ad_point_type' => array(
			'form_type' 	=> FORM_TYPE_RADIO,
		),
		'ad_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_item_price' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_point_percent' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,ad_category',
		),
		'ad_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_stock_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'ad_start_status' => array(
			'name'		=> '�����ۿ�������������',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'ad_end_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'ad_type' => array(
			'form_type'	=> FORM_TYPE_RADIO,
			'option'	=> array(1 => '��󥯥�å�', 2 => '��Ͽ',),
		),
		'ad_display_type' => array(
			'form_type'	=> FORM_TYPE_RADIO,
			'option'	=> array(1 => 'WEB', 2 => 'MAIL',),
		),
		'ad_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
		'ad_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
		'ad_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// �ۿ���
		'ad_stock_num' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'ad_stock_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ���ơ�����
		'ad_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'ad_start_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'ad_end_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ��������
		'ad_created_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_created_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_created_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_created_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_created_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_created_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'ad_updated_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_updated_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_updated_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_updated_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_updated_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_updated_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �������
		'ad_deleted_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_deleted_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_deleted_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_deleted_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_deleted_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_deleted_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ����ϴ���
		'ad_start_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_start_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_start_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_start_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ���λ����
		'ad_end_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_end_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_end_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_end_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
	);
}
/**
 * ��������������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdList extends Tv_ActionAdminOnly
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
		return 'admin_ad_list';
	}
}
?>