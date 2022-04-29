<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х�������Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAvatarstandEdit extends Tv_Form_AdminAvatarstandEditDo
{
}

/**
 * �������Х�������Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarstandEdit extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// ���Х����������
		$ac =& new Tv_AvatarStand($this->backend, 'avatar_stand_id', $this->af->get('avatar_stand_id'));
		$ac->exportForm();
		return 'admin_avatarstand_edit';
	}
}
?>