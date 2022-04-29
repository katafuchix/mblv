<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 仕入先編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcSupplierEdit extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 情報の取得
		$o =& new Tv_Supplier($this->backend,'supplier_id',$this->af->get('supplier_id'));
		$o->exportform();
		$this->af->setApp("supplier_id",$this->af->get('supplier_id'));

		// 同梱対象一覧
		$um =& $this->backend->getManager('Util');
		$list = $um->getAttrList('supplier');
		$this->af->setApp('supplier_list', $list);
		
		// 同梱許可されているID
		$o =& new Tv_Supplier($this->backend, 'supplier_id', $this->af->get('supplier_id'));
		$o->exportform();
		$ids = $o->get('supplier_bundle_allow_id');
		$ids = explode(':', $ids);
		unset($ids[0]);
		$this->af->setApp('supplier_bundle_allow_id', $ids);
		
		//チェックボックス用にリスト生成
		foreach($list as $k => $v){
			$supplier_allow_list[$k]['id'] = $k;
			$supplier_allow_list[$k]['name'] = $v['name'];
			if(in_array($k, $ids)){
				$supplier_allow_list[$k]['checked'] = true;
			}else{
				$supplier_allow_list[$k]['checked'] = false;
			}
			
		}
		$this->af->setApp('supplier_allow_list', $supplier_allow_list);
	}
}
?>