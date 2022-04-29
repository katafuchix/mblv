<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ��Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideoEditDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'video_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'video_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'video_file1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file1_file' => array(
			'name'			=> '����ɽ���ѥե�����',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file1_status' => array(
			'name'			=> '����ɽ���ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file2_file' => array(
			'name'			=> '�ܺ�ɽ���ѥե�����',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file2_status' => array(
			'name'			=> '�ܺ�ɽ���ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_d' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_d_file' => array(
			'name'			=> 'DOCOMO�ѥե�����',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_d_status' => array(
			'name'			=> 'DOCOMO�ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_a' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_a_file' => array(
			'name'			=> 'AU�ѥե�����',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_a_status' => array(
			'name'			=> 'AU�ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_s' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_s_file' => array(
			'name'			=> 'SOFTBANK�ѥե�����',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_s_status' => array(
			'name'			=> 'SOFTBANK�ѥե����륹�ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'video_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'		=> 'Util,video_category',
		),
		'video_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'video_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// �ۿ�����
		'video_start_status' => array(
			'name'			=> '�ӥǥ��ۿ�������������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'video_start_time' => array(
			'name'			=> '�ӥǥ��ۿ���������',
		),
		'video_start_year' => array(
			'name'			=> '�ӥǥ��ۿ�����������ǯ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_start_year' => array(
			'name'			=> '�ӥǥ��ۿ�����������ǯ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_start_month' => array(
			'name'			=> '�ӥǥ��ۿ����������ʷ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'video_start_day' => array(
			'name'			=> '�ӥǥ��ۿ���������������',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'video_start_hour' => array(
			'name'			=> '�ӥǥ��ۿ����������ʻ���',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'video_start_min' => array(
			'name'			=> '�ӥǥ��ۿ�����������ʬ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// �ۿ���λ
		'video_end_status' => array(
			'name'			=> '�ӥǥ��ۿ���λ��������',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'video_end_time' => array(
			'name'			=> '�ӥǥ��ۿ���λ����',
		),
		'video_end_year' => array(
			'name'			=> '�ӥǥ��ۿ���λ������ǯ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_end_year' => array(
			'name'			=> '�ӥǥ��ۿ���λ������ǯ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_end_month' => array(
			'name'			=> '�ӥǥ��ۿ���λ�����ʷ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'video_end_day' => array(
			'name'			=> '�ӥǥ��ۿ���λ����������',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'video_end_hour' => array(
			'name'			=> '�ӥǥ��ۿ���λ�����ʻ���',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'video_end_min' => array(
			'name'			=> '�ӥǥ��ۿ���λ������ʬ��',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * �����ӥǥ��Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideoEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_video_edit';
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
		// �ӥǥ��Խ�
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Video($this->backend, 'video_id', $this->af->get('video_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('video_updated_time', $timestamp);
		// �ӥǥ��ۿ���λ������
		if(!$this->af->get('video_stock_status')){
			$o->set('video_stock_status', 0);
			$o->set('video_stock_num', '');
		}
		// �ӥǥ��ۿ�������������
		if(!$this->af->get('video_start_status')){
			$o->set('video_start_status', 0);
			$o->set('video_start_time', '');
		}else{
			$o->set('video_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('video_start_year' ),
					$this->af->get('video_start_month'),
					$this->af->get('video_start_day'),
					$this->af->get('video_start_hour'),
					$this->af->get('video_start_min')
				)
			);
		}
		// �ӥǥ��ۿ���λ��������
		if(!$this->af->get('video_end_status')){
			$o->set('video_end_status', 0);
			$o->set('video_end_time', '');
		}else{
			$o->set('video_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('video_end_year' ),
					$this->af->get('video_end_month'),
					$this->af->get('video_end_day'),
					$this->af->get('video_end_hour'),
					$this->af->get('video_end_min')
				)
			);
		}
		// �ӥǥ��ե�����1�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_file1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file1', $um->uploadFile($this->af->get('video_file1_file'),'video'));
		}
		// �ӥǥ��ե�����1�κ��(2=���)
		elseif($this->af->get('video_file1_status') == 2){
			$o->set('video_file1', '');
		}
		// �ӥǥ��ե�����2�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_file2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file2', $um->uploadFile($this->af->get('video_file2_file'),'video'));
		}
		// �ӥǥ��ե�����2�κ��(2=���)
		elseif($this->af->get('video_file2_status') == 2){
			$o->set('video_file2', '');
		}
		// �ӥǥ��ե�����d�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_file_d_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_d', $um->uploadFile($this->af->get('video_file_d_file'),'video'));
		}
		// �ӥǥ��ե�����d�κ��(2=���)
		elseif($this->af->get('video_file_d_status') == 2){
			$o->set('video_file_d', '');
		}
		// �ӥǥ��ե�����a�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_file_a_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_a', $um->uploadFile($this->af->get('video_file_a_file'),'video'));
		}
		// �ӥǥ��ե�����a�κ��(2=���)
		elseif($this->af->get('video_file_a_status') == 2){
			$o->set('video_file_a', '');
		}
		// �ӥǥ��ե�����s�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_file_s_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_s', $um->uploadFile($this->af->get('video_file_s_file'),'video'));
		}
		// �ӥǥ��ե�����s�κ��(2=���)
		elseif($this->af->get('video_file_s_status') == 2){
			$o->set('video_file_s', '');
		}
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_video_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_EDIT_DONE);
		return 'admin_video_list';
	}
}
?>