<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������ɥ��ƥ�����Ͽ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundcategoryAddDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'sound_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'sound_category_file1' => array(
			'name'		=> '������ɥ��ƥ���ե�����1',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_file2' => array(
			'name'		=> '������ɥ��ƥ���ե�����2',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_category_color' => array(
			'name'	=> '������ɥ��ƥ��꿧',
			'type' 	=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * ����������ɥ��ƥ�����Ͽ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_soundcategory_add';
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
		$um = $this->backend->getManager('Util');
		
		// ������ɥ��ƥ�����Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_SoundCategory($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('sound_category_status', 1);
		// ������ɥ��ƥ���ե�����1�Υ��åץ���
		if($this->af->get('sound_category_file1')){
			$o->set('sound_category_file1', $um->uploadFile($this->af->get('sound_category_file1'),'sound'));
		}
		// ������ɥ��ƥ���ե�����2�Υ��åץ���
		if($this->af->get('sound_category_file2')){
			$o->set('sound_category_file2', $um->uploadFile($this->af->get('sound_category_file2'),'sound'));
		}
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_soundcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_ADD_DONE);
		return 'admin_soundcategory_list';
	}
}
?>