<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ʺ���¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemDeleteDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'item_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'shop_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * �������ʺ���¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemDeleteDo extends Tv_ActionAdminOnly
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
		$itemObject =& new Tv_Item($this->backend,'item_id',$this->af->get('item_id'));
		$itemObject->set('item_status',0);
		$itemObject->set('item_deleted_time',date('Y-m-d H:i:s'));
		$r = $itemObject->update();
		if(Ethna::isError($r)) return 'admin_ec_item_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_EDIT_DONE);
		
		return 'admin_ec_item_list';
	}
}
?>