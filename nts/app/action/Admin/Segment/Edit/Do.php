<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �������������Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'segment_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'segment_name' => array(
			'name'			=> '��������̾',
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_carrier_status' => array(
			'name'			=> '����ꥢ��������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_carrier' => array(
			'name'			=> '����ꥢ',
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'DOCOMO',
						2	=> 'AU',
						3 	=> 'SOFTBANK',
			),
		),
		'user_point_status' => array(
			'name'			=> '�ݥ���ȥ�������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_point_min' => array(
			'name'			=> '�ݥ���ȡʺǾ���',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_point_max' => array(
			'name'			=> '�ݥ���ȡʺ����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_age_status' => array(
			'name'			=> 'ǯ�𥻥�����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_age_min' => array(
			'name'			=> 'ǯ��ʺǾ���',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'			=> 'ǯ��ʺ����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_sex_status' => array(
			'name'			=> '���̥�������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_sex' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'prefecture_id_status' => array(
			'name'			=> '���ꥻ������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'prefecture_id' => array(
			'name'			=> '����',
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'job_family_id_status' => array(
			'name'			=> '���糧������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'job_family_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'business_category_id_status' => array(
			'name'			=> '�ȼ糧������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'business_category_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_is_married_status' => array(
			'name'			=> '�뺧��������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_is_married' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_has_children_status' => array(
			'name'			=> '�Ҷ���������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_has_children' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_blood_type_status' => array(
			'name'			=> '��շ���������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_blood_type' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'work_location_prefecture_id_status' => array(
			'name'			=> '��̳�ϥ�������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'work_location_prefecture_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_created_status' => array(
			'name'			=> '��Ͽ����������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> '���������ۿ�����Ѥ���',
			),
		),
		'user_created_year_start' => array(
			'name'			=> '��Ͽ����ǯ',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'user_created_month_start' => array(
			'name'			=> '��Ͽ���Ϸ�',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'user_created_day_start' => array(
			'name'			=> '��Ͽ������',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
		'user_created_year_end' => array(
			'name'			=> '��Ͽ��λǯ',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'user_created_month_end' => array(
			'name'			=> '��Ͽ��λ��',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'user_created_day_end' => array(
			'name'			=> '��Ͽ��λ��',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
	);
}

/**
 * �������������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_segment_edit';
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
		// ���������Խ�
		$m =& new Tv_Segment($this->backend,'segment_id',$this->af->get('segment_id'));
		$m->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �������Ȥ򥻥å�
		$sm = $this->backend->getManager('Segment');
		$m = $sm->setSegment($m);
		// �оݥ桼�������������
		$user_list = $sm->getSegmentUser();
		$m->set('segment_user_num', count($user_list));
		// ����
		$r = $m->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_segment_edit';
		
		$this->ae->add("errors","���������Խ�����λ���ޤ���");
		return 'admin_segment_list';
	}
}
?>