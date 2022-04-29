<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������å��Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminEcShopEdit extends Tv_Form_AdminEcShopEditDo
{
	
}


/**
 * ��������å��Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopEdit extends Tv_ActionAdminOnly
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
		$um = $this->backend->getManager('Util');
		
		// ����å׾������
		$o =& new Tv_Shop($this->backend, 'shop_id', $this->af->get('shop_id'));
		$o->exportForm();
		
		// ���Υ���åפξ���ID�μ�����csv�ǡ˸��ߤϻȤäƤʤ�
		$param = array(
			'sql_select'	=> 'item_id',
			'sql_from'		=> 'item',
			'sql_where'		=> 'shop_id = ? and item_status = 1',
			'sql_values'	=> array($this->af->get('shop_id')),
		);
		$r = $um->dataQuery($param);
		if($r){
			foreach($r as $v) $item_id_array[] = $v['item_id'];
			$item_id_csv = implode(',', $item_id_array);
			$this->af->setApp('item_id_csv', $item_id_csv);
		}
		
		return 'admin_ec_shop_edit';
	}
}
?>