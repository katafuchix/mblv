<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������ɥ��ƥ����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminSoundcategoryEdit extends Tv_Form_AdminSoundcategoryEditDo
{
}

/**
 * ����������ɥ��ƥ����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryEdit extends Tv_ActionAdminOnly
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
		// ������ɥ��ƥ���������
		$sc =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$sc->exportForm();
		return 'admin_soundcategory_edit';
	}
}
?>