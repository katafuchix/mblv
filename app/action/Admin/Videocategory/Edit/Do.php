<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ����ƥ����Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideocategoryEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'video_category_id' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'video_category_name' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_category_desc' => array(
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_category_file1' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'video_category_file1_file' => array(
			'name'			=> '�ӥǥ����ƥ���ե�����1',
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'video_category_file1_status' => array(
			'name'			=> '�ӥǥ����ƥ���ե�����1���ơ�����',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_category_file2' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'video_category_file2_file' => array(
			'name'			=> '�ӥǥ����ƥ���ե�����2',
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'video_category_file2_status' => array(
			'name'			=> '�ӥǥ����ƥ���ե�����2���ơ�����',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_category_color' => array(
			'name'			=> '�ӥǥ����ƥ��꿧',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * �����ӥǥ����ƥ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideocategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_videocategory_edit';
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
		// �ӥǥ����ƥ����Խ�
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_VideoCategory($this->backend, 'video_category_id', $this->af->get('video_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// �ӥǥ����ƥ���ե�����1�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_category_file1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_category_file1', $um->uploadFile($this->af->get('video_category_file1_file'),'video'));
		}
		// �ӥǥ����ƥ���ե�����1�κ��(2=���)
		elseif($this->af->get('video_category_file1_status') == 2){
			$o->set('video_category_file1', '');
		}
		// �ӥǥ����ƥ���ե�����2�Υ��åץ���(1=�Խ�)
		if($this->af->get('video_category_file2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_category_file2', $um->uploadFile($this->af->get('video_category_file2_file'),'video'));
		}
		// �ӥǥ����ƥ���ե�����2�κ��(2=���)
		elseif($this->af->get('video_category_file2_status') == 2){
			$o->set('video_category_file2', '');
		}
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_videocategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_CATEGORY_EDIT_DONE);
		return 'admin_videocategory_list';
	}
}
?>