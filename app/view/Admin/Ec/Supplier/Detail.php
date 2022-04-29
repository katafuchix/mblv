<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 仕入先詳細画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcSupplierDetail extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		header('Content-type: text/xml; charset=UTF-8');
		
		// 情報の取得
		$o =& new Tv_Supplier($this->backend,'supplier_id',$this->af->get('supplier_id'));
		$o->exportform();
		$this->af->setApp("supplier_id",$this->af->get('supplier_id'));
		
		$um = & $this->backend->getManager('Util');
		$this->af->setApp("supplier_list",$um->getAttrList('supplier'));
	}
}
?>