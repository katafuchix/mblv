<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������Х��������Ͽ�¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAvatarstandAddDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'avatar_stand_name' => array(
			'name'			=> '���Х������̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_stand_image' => array(
			'name'			=> '���Х�����²���',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
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
 * �������Х��������Ͽ�¹Խ������������¹ԥ��饹
 * 
 * ���Х�����¤���Ͽ���ޤ�
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarstandAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarstand_add';
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
		// ���Х��������Ͽ
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_AvatarStand($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('avatar_stand_status', 1);
		// ���Х�������1�Υ��åץ���
		if($this->af->get('avatar_stand_image')){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_stand_image', $um->uploadFile($this->af->get('avatar_stand_image'), 'avatar'));
		}
		// ��Ͽ
		$r = $o->add();
		// ��Ͽ���顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatarstand_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_STAND_ADD_DONE);
		return 'admin_avatarstand_list';
	}
}
?>