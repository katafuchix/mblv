<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ショップ編集アクションフォームクラス
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
 * 管理ショップ編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopEdit extends Tv_ActionAdminOnly
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
		$um = $this->backend->getManager('Util');
		
		// ショップ情報取得
		$o =& new Tv_Shop($this->backend, 'shop_id', $this->af->get('shop_id'));
		$o->exportForm();
		
		// このショップの商品IDの取得（csvで）現在は使ってない
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