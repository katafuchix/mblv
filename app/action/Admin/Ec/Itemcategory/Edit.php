<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ƥ����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminEcItemcategoryEdit extends Tv_Form_AdminEcItemcategoryEditDo
{
}

/**
 * �������ƥ����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryEdit extends Tv_ActionAdminOnly
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
		// ���ƥ������μ���
		$o =& new Tv_ItemCategory($this->backend,'item_category_id',$this->af->get('item_category_id'));
		$o->exportform();
		
		return 'admin_ec_itemcategory_edit';
	}
}
?>