<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminThemaAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'thema_title' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		//	'required'	=> true,
		),
		'thema_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'thema_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
		'thema_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'thema_start_status' => array(
			'name'		=> '�����ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'thema_start_year' => array(
			'name'		=> '�����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_start_year' => array(
			'name'		=> '�����ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_start_month' => array(
			'name'		=> '�����ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'thema_start_day' => array(
			'name'		=> '�����ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'thema_start_hour' => array(
			'name'		=> '�����ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'thema_start_min' => array(
			'name'		=> '�����ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'thema_end_status' => array(
			'name'		=> '�����ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'thema_end_year' => array(
			'name'		=> '�����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_end_year' => array(
			'name'		=> '�����ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_end_month' => array(
			'name'		=> '�����ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'thema_end_day' => array(
			'name'		=> '�����ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'thema_end_hour' => array(
			'name'		=> '�����ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'thema_end_min' => array(
			'name'		=> '�����ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'thema_stock_num' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'thema_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'type'			=> VAR_TYPE_STRING,
			'option'		=> array(1=>''),
		),
	);
}

/**
 * ����������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminThemaAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_thema_add';
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
		// �����५�ƥ�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Thema($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('thema_status', 1);
		
		// �����ۿ�������������
		if(!$this->af->get('thema_start_status')){
			$o->set('thema_start_status', 0);
			$o->set('thema_start_time', '');
		}else{
			$o->set('thema_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('thema_start_year' ),
					$this->af->get('thema_start_month'),
					$this->af->get('thema_start_day'),
					$this->af->get('thema_start_hour'),
					$this->af->get('thema_start_min')
				)
			);
		}
		// �����ۿ���λ��������
		if(!$this->af->get('thema_end_status')){
			$o->set('thema_end_status', 0);
			$o->set('thema_end_time', '');
		}else{
			$o->set('thema_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('thema_end_year' ),
					$this->af->get('thema_end_month'),
					$this->af->get('thema_end_day'),
					$this->af->get('thema_end_hour'),
					$this->af->get('thema_end_min')
				)
			);
		}
		
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_thema_list';
		
		$this->ae->add(null, '', I_ADMIN_THEMA_ADD_DONE);
		return 'admin_thema_list';
	}
}
?>
