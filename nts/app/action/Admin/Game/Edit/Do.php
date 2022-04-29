<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����������Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminGameEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'game_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'game_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'game_code' => array(
			'type'				=> VAR_TYPE_STRING,
			'form_type'			=> FORM_TYPE_TEXT,
			'required'			=> true,
			'regexp'			=> '/^[a-zA-Z0-9]+$/',
			'min'				=> 1,
			'max'				=> 32,
			'required_error'	=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'min_error'			=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
			'max_error'			=> '{form}��Ⱦ�ѱѿ���32ʸ����������������Ϥ��Ƥ�������',
			'regexp_error'		=> '{form}��Ⱦ�ѱѿ���1ʸ���ʾ�����������Ϥ��Ƥ�������',
		),
		'game_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'game_explain' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'game_file1_file' => array(
			'name'		=> '����ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file1_status' => array(
			'name'		=> '����ɽ���ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'game_file2_file' => array(
			'name'		=> '�ܺ�ɽ���ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file2_status' => array(
			'name'		=> '�ܺ�ɽ���ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_file3' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'game_file3_file' => array(
			'name'		=> '����������ѥե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file3_status' => array(
			'name'		=> '����������ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'game_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'GameCategory,category',
		),
		'game_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'game_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// �ۿ�����
		'game_start_status' => array(
			'name'		=> '�������ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_start_year' => array(
			'name'		=> '�������ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_year' => array(
			'name'		=> '�������ۿ�����������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_month' => array(
			'name'		=> '�������ۿ����������ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_start_day' => array(
			'name'		=> '�������ۿ���������������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_start_hour' => array(
			'name'		=> '�������ۿ����������ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_start_min' => array(
			'name'		=> '�������ۿ�����������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'game_end_status' => array(
			'name'		=> '�������ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_end_year' => array(
			'name'		=> '�������ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_year' => array(
			'name'		=> '�������ۿ���λ������ǯ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_month' => array(
			'name'		=> '�������ۿ���λ�����ʷ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_end_day' => array(
			'name'		=> '�������ۿ���λ����������',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_end_hour' => array(
			'name'		=> '�������ۿ���λ�����ʻ���',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_end_min' => array(
			'name'		=> '�������ۿ���λ������ʬ��',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �����������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGameEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_game_edit';
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
		// �������Խ�
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		
		// Ʊ�����̥����ɤ��ʤ����ɤ�����ǧ
		if($this->af->get('game_code') != $o->get('game_code')){
			$um = $this->backend->getManager('Util');
			$param = array(
				'sql_select'	=> 'game_id',
				'sql_from'		=> 'game',
				'sql_where'		=> 'game_code = ?',
				'sql_values'	=> array($this->af->get('game_code')),
			);
			$r = $um->dataQuery($param);
			if(count($r) > 0){
				$this->ae->add(null, '', E_ADMIN_GAME_CODE_DUPLICATE);
				return 'admin_game_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('game_updated_time', $timestamp);
		// �������ۿ���λ������
		if(!$this->af->get('game_stock_status')){
			$o->set('game_stock_status', 0);
			$o->set('game_stock_num', '');
		}
		// �������ۿ�������������
		if(!$this->af->get('game_start_status')){
			$o->set('game_start_status', 0);
			$o->set('game_start_time', '');
		}else{
			$o->set('game_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('game_start_year' ),
					$this->af->get('game_start_month'),
					$this->af->get('game_start_day'),
					$this->af->get('game_start_hour'),
					$this->af->get('game_start_min')
				)
			);
		}
		// �������ۿ���λ��������
		if(!$this->af->get('game_end_status')){
			$o->set('game_end_status', 0);
			$o->set('game_end_time', '');
		}else{
			$o->set('game_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('game_end_year' ),
					$this->af->get('game_end_month'),
					$this->af->get('game_end_day'),
					$this->af->get('game_end_hour'),
					$this->af->get('game_end_min')
				)
			);
		}
		// ������ե�����1�Υ��åץ���
		if($this->af->get('game_file1_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file1', $um->uploadFile($this->af->get('game_file1_file'),'game'));
		}elseif($this->af->get('game_file1_status') == 'delete'){
			$o->set('game_file1', '');
		}
		// ������ե�����2�Υ��åץ���
		if($this->af->get('game_file2_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file2', $um->uploadFile($this->af->get('game_file2_file'),'game'));
		}elseif($this->af->get('game_file2_status') == 'delete'){
			$o->set('game_file2', '');
		}
		// ������ե�����3�Υ��åץ���
		if($this->af->get('game_file3_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file3', $um->uploadFile($this->af->get('game_file3_file'),'game'));
		}elseif($this->af->get('game_file3_status') == 'delete'){
			$o->set('game_file3', '');
		}
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_game_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_GAME_EDIT_DONE);
		return 'admin_game_list';
	}
}
?>