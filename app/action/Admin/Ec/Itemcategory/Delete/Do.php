<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理カテゴリ削除実行アクションフォームクラス
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
 * 管理カテゴリ削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryDeleteDo extends Tv_ActionAdminOnly
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