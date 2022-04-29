<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������ɥ��ƥ����Խ��¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminSoundcategoryEditDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'sound_category_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'sound_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_file1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'sound_category_file1_file' => array(
			'name'		=> '������ɥ��ƥ���ե�����1',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file1_status' => array(
			'name'		=> '������ɥ��ƥ���ե�����1���ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'sound_category_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'sound_category_file2_file' => array(
			'name'		=> '������ɥ��ƥ���ե�����2',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file2_status' => array(
			'name'		=> '������ɥ��ƥ���ե�����2���ơ�����',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'sound_category_color' => array(
			'name'	=> '������ɥ��ƥ��꿧',
			'type' 	=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * ����������ɥ��ƥ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminSoundcategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_soundcategory_edit';
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
		// ������ɥ��ƥ����Խ�
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ������ɥ��ƥ���ե�����1�Υ��åץ���
		if($this->af->get('sound_category_file1_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('sound_category_file1', $um->uploadFile($this->af->get('sound_category_file1_file'),'sound'));
		}elseif($this->af->get('sound_category_file1_status') == 'delete'){
			$o->set('sound_category_file1', '');
		}
		// ������ɥ��ƥ���ե�����2�Υ��åץ���
		if($this->af->get('sound_category_file2_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('sound_category_file2', $um->uploadFile($this->af->get('sound_category_file2_file'),'sound'));
		}elseif($this->af->get('sound_category_file2_status') == 'delete'){
			$o->set('sound_category_file2', '');
		}
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_soundcategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_EDIT_DONE);
		return 'admin_soundcategory_list';
	}
}
?>