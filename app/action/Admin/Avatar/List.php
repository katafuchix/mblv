<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х����������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarList extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_category_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'name'			=> '���Х������ƥ���',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_category',
		),
		'avatar_id' => array(
			'name'			=> '���Х���ID',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_name' => array(
			'name'			=> '���Х���̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_desc' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_body' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_z' => array(
			'name'			=> '���Х���Z��ɸ',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// �ۿ���
		'avatar_stock_num' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_stock_status' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ���ơ�����
		'avatar_status' => array(
			'name'			=> '���Х������ơ�����',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'avatar_start_status' => array(
			'name'			=> '���Х����ۿ����ϥ��ơ�����',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'avatar_end_status' => array(
			'name'			=> '���Х����ۿ���λ���ơ�����',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ��������
		'avatar_created_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_created_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_created_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_created_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_created_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_created_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'avatar_updated_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_updated_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_updated_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_updated_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_updated_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_updated_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �������
		'avatar_deleted_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_deleted_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_deleted_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_deleted_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_deleted_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_deleted_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ����ϴ���
		'avatar_start_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_start_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ���λ����
		'avatar_end_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_end_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
	);
}

/**
 * �������Х����������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarList extends Tv_ActionAdminOnly
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
		return 'admin_avatar_list';
	}
}
?>