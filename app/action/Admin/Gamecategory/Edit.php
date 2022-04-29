<?php
/**
 * .php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������५�ƥ����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminGamecategoryEdit extends Tv_Form_AdminGamecategoryEditDo
{
}

/**
 * ���������५�ƥ����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminGamecategoryEdit extends Tv_ActionAdminOnly
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
		// �����५�ƥ���������
		$gc =& new Tv_GameCategory($this->backend, 'game_category_id', $this->af->get('game_category_id'));
		$gc->exportForm();
		return 'admin_gamecategory_edit';
	}
}
?>