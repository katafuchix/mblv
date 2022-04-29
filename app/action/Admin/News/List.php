<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����˥塼���������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNewsList extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'news_id' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'news_title' => array(
		),
		'news_body' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'news_type' => array(
		),
		'news_time' => array(
		),
		'news_status' => array(
			'name'			=> '���ơ�����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ��������
		'news_created_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_created_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_created_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_created_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_created_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_created_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'news_updated_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_updated_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_updated_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_updated_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_updated_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_updated_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �������
		'news_deleted_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_deleted_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_deleted_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_deleted_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_deleted_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_deleted_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ����ϴ���
		'news_start_status' => array(
			'name'			=> '�ۿ�������������',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, regist_status',
		),
		'news_start_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_start_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// �ۿ���λ����
		'news_end_status' => array(
			'name'			=> '�ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, regist_status',
		),
		'news_end_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_end_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��繹����
		'id' => array(
			'name'		=> 'ID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> array(FORM_TYPE_HIDDEN),
		),
		'check' => array(
			'name'		=> '�����å�ID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'update'	=> array(),
	);
}

/**
 * �����˥塼���������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsList extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_news_list';
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
		// ���ơ��������ƻ륹�ơ�������������
		if($this->af->get('update'))
			$this->updateStatusAll('news');
		
		return 'admin_news_list';
	}
}
?>