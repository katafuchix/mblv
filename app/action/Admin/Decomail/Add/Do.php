<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ǥ��᡼����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminDecomailAddDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'decomail_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'decomail_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'decomail_file1' => array(
			'name'		=> '����ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file2' => array(
			'name'		=> '�ܺ�ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_d' => array(
			'name'		=> 'DOCOMO�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_a' => array(
			'name'		=> 'AU�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_s' => array(
			'name'		=> 'SOFTBANK�ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'decomail_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,decomail_category',
		),
		'decomail_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'decomail_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// �ۿ�����
		'decomail_start_status' => array(
			'name'		=> '�ǥ��᡼���ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'decomail_start_time' => array(
			'name'		=> '�ǥ��᡼���ۿ���������',
		),
		'decomail_start_year' => array(
			'name'		=> '�ǥ��᡼���ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_start_year' => array(
			'name'		=> '�ǥ��᡼���ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_start_month' => array(
			'name'		=> '�ǥ��᡼���ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'decomail_start_day' => array(
			'name'		=> '�ǥ��᡼���ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'decomail_start_hour' => array(
			'name'		=> '�ǥ��᡼���ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'decomail_start_min' => array(
			'name'		=> '�ǥ��᡼���ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'decomail_end_status' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'decomail_end_time' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ����',
		),
		'decomail_end_year' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_end_year' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_end_month' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'decomail_end_day' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'decomail_end_hour' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'decomail_end_min' => array(
			'name'		=> '�ǥ��᡼���ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �����ǥ��᡼����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminDecomailAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomail_add';
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
		// �ǥ��᡼����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Decomail($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('decomail_status', 1);
		$o->set('decomail_created_time', $timestamp);
		$o->set('decomail_updated_time', $timestamp);
		// �ǥ��᡼���ۿ���λ������
		if(!$this->af->get('decomail_stock_status')){
			$o->set('decomail_stock_status', 0);
			$o->set('decomail_stock_num', '');
		}
		// �ǥ��᡼���ۿ�������������
		if(!$this->af->get('decomail_start_status')){
			$o->set('decomail_start_status', 0);
			$o->set('decomail_start_time', '');
		}else{
			$o->set('decomail_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('decomail_start_year' ),
					$this->af->get('decomail_start_month'),
					$this->af->get('decomail_start_day'),
					$this->af->get('decomail_start_hour'),
					$this->af->get('decomail_start_min')
				)
			);
		}
		// �ǥ��᡼���ۿ���λ��������
		if(!$this->af->get('decomail_end_status')){
			$o->set('decomail_end_status', 0);
			$o->set('decomail_end_time', '');
		}else{
			$o->set('decomail_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('decomail_end_year' ),
					$this->af->get('decomail_end_month'),
					$this->af->get('decomail_end_day'),
					$this->af->get('decomail_end_hour'),
					$this->af->get('decomail_end_min')
				)
			);
		}
		// �ǥ��᡼��ե�����1�Υ��åץ���
		if($this->af->get('decomail_file1')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file1', $um->uploadFile($this->af->get('decomail_file1'),'decomail'));
		}
		// �ǥ��᡼��ե�����2�Υ��åץ���
		if($this->af->get('decomail_file2')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file2', $um->uploadFile($this->af->get('decomail_file2'),'decomail'));
		}
		// DOCOMO�ѥǥ��᡼��ե�����Υ��åץ���
		if($this->af->get('decomail_file_d')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_d', $um->uploadFile($this->af->get('decomail_file_d'),'decomail'));
		}
		// AU�ѥǥ��᡼��ե�����Υ��åץ���
		if($this->af->get('decomail_file_a')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_a', $um->uploadFile($this->af->get('decomail_file_a'),'decomail'));
		}
		// SOFTBANK�ѥǥ��᡼��ե�����Υ��åץ���
		if($this->af->get('decomail_file_s')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_s', $um->uploadFile($this->af->get('decomail_file_s'),'decomail'));
		}
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_decomail_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_ADD_DONE);
		return 'admin_decomail_list';
	}
}
?>