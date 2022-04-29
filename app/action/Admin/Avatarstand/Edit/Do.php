<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х�������Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarstandEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_stand_id' => array(
			'name'			=> '���Х������ID',
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'avatar_stand_name' => array(
			'name'			=> '���Х������̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'avatar_stand_image' => array(
			'name'			=> '���Х�����²���',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_stand_image_file' => array(
			'name'			=> '���Х�����²���',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_stand_image_status' => array(
			'name'			=> '���Х�����²������ơ�����',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'avatar_stand_base_x' => array(
			'name'			=> '���Х�������ڤ�Ф�����X��ɸ',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_y' => array(
			'name'			=> '���Х�������ڤ�Ф�����Y��ɸ',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_w' => array(
			'name'			=> '���Х�������ڤ�Ф���',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_base_h' => array(
			'name'			=> '���Х�������ڤ�Ф��⤵',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_w' => array(
			'name'			=> '���Х������ɽ����',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_h' => array(
			'name'			=> '���Х������ɽ���⤵',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * �������Х�������Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarstandEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarstand_edit';
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
		// avatar_stand_id���饢�Х�������Խ�
		$o =& new Tv_AvatarStand($this->backend, 'avatar_stand_id', $this->af->get('avatar_stand_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// ���Х�������1�Υ��åץ���(1=�Խ�)
		if($this->af->get('avatar_stand_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_stand_image', $um->uploadFile($this->af->get('avatar_stand_image_file'), 'avatar'));
		}
		// ���Х�������1�κ��(2=���)
		elseif($this->af->get('avatar_stand_image_status') == 2){
			$o->set('avatar_stand_image', '');
		}
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatarstand_edit';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_EDIT_DONE);
		return 'admin_avatarstand_list';
	}
}
?>