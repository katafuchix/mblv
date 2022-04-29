<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ե���������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminFileList extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'name'	  	=> '��ͭ�桼��ID',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_mime_type' => array(
			'name'	  	=> 'MIME������',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_size_max' => array(
			'name'	  	=> '�ե����륵����(����)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_size_min' => array(
			'name'	  	=> '�ե����륵����(�Ǿ�)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// �ե����륢�åץ��ɴ���
		'file_upload_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'file_upload_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'file_upload_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'file_upload_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'file_upload_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'file_upload_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'file_status' => array(
			'name'	 	 => '����',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, file_status',
		),
		'sort_key' => array(
			'name'	  => '�����Ȥ˻��Ѥ��륭��',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('��ͭ�桼��ID', 'MIME������', '�ե����륵����', '���åץ�������'),
		),
		'sort_order' => array(
			'name'	  => '�����Ƚ�',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('����', '�߽�'),
		),
	);
}

/**
 * �����ե���������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminFileList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_file_list';
		
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
		return 'admin_file_list';
	}
}
?>