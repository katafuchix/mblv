<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������å׺���¹ԥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * ��������å׺���¹ԥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopDeleteDo extends Tv_ActionAdminOnly
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
		// ����å׾����������
		$o =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		$o->set('shop_status',0);
		$o->set('shop_deleted_time',date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_shop_list';
		
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SHOP_DELETE_DONE);
		
		return 'admin_ec_shop_list';
	}
}
?>