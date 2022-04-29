<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х������ƥ����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAvatarcategoryEdit extends Tv_Form_AdminAvatarcategoryEditDo
{
}

/**
 * �������Х������ƥ����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryEdit extends Tv_ActionAdminOnly
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
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $this->af->get('avatar_category_id'));
		$ac->exportForm();
		return 'admin_avatarcategory_edit';
	}
}
?>