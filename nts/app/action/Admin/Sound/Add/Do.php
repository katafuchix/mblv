<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminSoundAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'sound_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'sound_file1' => array(
			'name'		=> '����ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file2' => array(
			'name'		=> '�ܺ�ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_d' => array(
			'name'		=> 'DOCOMO�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_a' => array(
			'name'		=> 'AU�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_s' => array(
			'name'		=> 'SOFTBANK�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'sound_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,sound_category',
		),
		'sound_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'sound_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// �ۿ�����
		'sound_start_status' => array(
			'name'		=> '��������ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'sound_start_year' => array(
			'name'		=> '��������ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_year' => array(
			'name'		=> '��������ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_month' => array(
			'name'		=> '��������ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_start_day' => array(
			'name'		=> '��������ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_start_hour' => array(
			'name'		=> '��������ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'sound_start_min' => array(
			'name'		=> '��������ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'sound_end_status' => array(
			'name'		=> '��������ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'sound_end_year' => array(
			'name'		=> '��������ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_year' => array(
			'name'		=> '��������ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_month' => array(
			'name'		=> '��������ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_end_day' => array(
			'name'		=> '��������ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_end_hour' => array(
			'name'		=> '��������ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'sound_end_min' => array(
			'name'		=> '��������ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �������������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminSoundAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_sound_add';
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
		$um =& $this->backend->getManager('Util');
		// ���������Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Sound($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('sound_status', 1);
		$o->set('sound_created_time', $timestamp);
		$o->set('sound_updated_time', $timestamp);
		// ��������ۿ���λ������
		if(!$this->af->get('sound_stock_status')){
			$o->set('sound_stock_status', 0);
			$o->set('sound_stock_num', '');
		}
		// ��������ۿ�������������
		if(!$this->af->get('sound_start_status')){
			$o->set('sound_start_status', 0);
			$o->set('sound_start_time', '');
		}else{
			$o->set('sound_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('sound_start_year' ),
					$this->af->get('sound_start_month'),
					$this->af->get('sound_start_day'),
					$this->af->get('sound_start_hour'),
					$this->af->get('sound_start_min')
				)
			);
		}
		// ��������ۿ���λ��������
		if(!$this->af->get('sound_end_status')){
			$o->set('sound_end_status', 0);
			$o->set('sound_end_time', '');
		}else{
			$o->set('sound_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('sound_end_year' ),
					$this->af->get('sound_end_month'),
					$this->af->get('sound_end_day'),
					$this->af->get('sound_end_hour'),
					$this->af->get('sound_end_min')
				)
			);
		}
		// ������ɥե�����1�Υ��åץ�����
		if($this->af->get('sound_file1')){
			$o->set('sound_file1', $um->uploadFile($this->af->get('sound_file1'),'sound'));
		}
		// ������ɥե�����2�Υ��åץ�����
		if($this->af->get('sound_file2')){
			$o->set('sound_file2', $um->uploadFile($this->af->get('sound_file2'),'sound'));
		}
		// ������ɥե�����d�Υ��åץ�����
		if($this->af->get('sound_file_d')){
			$o->set('sound_file_d', $um->uploadFile($this->af->get('sound_file_d'),'sound'));
		}
		// ������ɥե�����a�Υ��åץ�����
		if($this->af->get('sound_file_a')){
			$o->set('sound_file_a', $um->uploadFile($this->af->get('sound_file_a'),'sound'));
		}
		// ������ɥե�����s�Υ��åץ�����
		if($this->af->get('sound_file_s')){
			$o->set('sound_file_s', $um->uploadFile($this->af->get('sound_file_s'),'sound'));
		}
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_sound_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SOUND_ADD_DONE);
		return 'admin_sound_list';
	}
}
?>