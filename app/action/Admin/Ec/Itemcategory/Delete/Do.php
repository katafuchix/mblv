<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ƥ������¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_category_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * �������ƥ������¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryDeleteDo extends Tv_ActionAdminOnly
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
		// ���ʾ����������
		$o =& new Tv_ItemCategory($this->backend,'item_category_id',$this->af->get('item_category_id'));
		$o->set('item_category_status',0);
		$timestamp = date('Y-m-d H:i:s');
		$o->set('item_category_updated_time', $timestamp);
		$o->set('item_category_deleted_time', $timestamp);
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_itemcategory_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_CATEGORY_DELETE_DONE);
		
		return 'admin_ec_itemcategory_list';
	}
}
?>