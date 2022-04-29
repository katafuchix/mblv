<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ݥ���ȸ򴹰������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminPointExchangeList extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'point_type' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array(
					10 => '�����Х󥯸�',
					11 => 'Edy��',
					12 => '�ݥ���ȥ����',
			),
		),
		'point_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, point_status',
		),
		'user_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_nickname' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'point_exchange_created_year_start' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,year',
		),
		'point_exchange_created_month_start' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,month',
		),
		'point_exchange_created_day_start' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,day',
		),
		'point_exchange_created_year_end' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,year',
		),
		'point_exchange_created_month_end' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,month',
		),
		'point_exchange_created_day_end' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,day',
		),
		'download' => array(
		),
	);
}

/**
 * �����ݥ���ȸ򴹰������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminPointExchangeList extends Tv_ActionAdminOnly
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
		return 'admin_point_exchange_list';
	}
}
?>