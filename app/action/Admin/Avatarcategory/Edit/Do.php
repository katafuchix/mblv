<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х������ƥ����Խ��¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarcategoryEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'avatar_category_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'avatar_category_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_category_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_system_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,avatar_system',
		),
		'avatar_stand_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,avatar_stand',
		),
	);
}

/**
 * �������Х������ƥ����Խ��¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatarcategory_edit';
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
		// ���֥������ȹ���
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $this->af->get('avatar_category_id'));
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_avatarcategory_edit';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_EDIT_DONE);
		return 'admin_avatarcategory_list';
	}
}
?>