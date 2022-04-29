<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcSupplierDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'supplier_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * �������������¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcSupplierDeleteDo extends Tv_ActionAdminOnly
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
		$o =& new Tv_Supplier($this->backend,'supplier_id',$this->af->get('supplier_id'));
		$o->set('supplier_status',0);
		$o->set('supplier_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		
		if(Ethna::isError($r)) return 'admin_ec_supplier_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SUPPLIER_DELETE_DONE);
		
		return 'admin_ec_supplier_list';
		
	}
}
?>