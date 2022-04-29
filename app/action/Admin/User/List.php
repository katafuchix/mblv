<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����桼�������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserList extends Tv_ActionForm
{
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_nickname' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_mailaddress' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_min' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_sex' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'prefecture_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_address' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_blood_type' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'job_family_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'business_category_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_is_married' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_has_children' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'work_location_prefecture_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_hobby' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_url' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_introduction' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_status',
		),
		'user_prof_checkbox' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_prof_keyword' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// ��Ͽ����
		'user_created_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_created_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_created_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_created_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_created_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_created_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'user_updated_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_updated_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_updated_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_updated_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_updated_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_updated_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ������
		'user_deleted_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_deleted_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_deleted_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_deleted_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_deleted_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_deleted_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_intoroduction' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		// �¤ӽ�
		'sort_key' => array(
			'name'			=> '�¤ӽ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> array(
				'user_created_time'		=>'��Ͽ����',
				 'user_updated_time'	=>'��������',
				 'user_deleted_time'	=>'�������',
			),
		),
		'sort_order' => array(
			'name'			=> '���',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> array(
				'asc'		=>'����',
				 'desc'		=>'�߽�',
			),
		),
		'download' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_carrier' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_carrier',
			'name'			=> '����ꥢ',
		),
		'user_device' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'name'		=> '����̾',
		),
	);
}

/**
 * �����桼�������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserList extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'admin_user_list';
		
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
		return 'admin_user_list';
	}
}
?>