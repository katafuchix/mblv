<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理仕入先削除実行アクションフォームクラス
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
 * 管理仕入先削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcSupplierDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// 商品情報論理削除
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