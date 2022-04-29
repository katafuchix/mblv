<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理商品削除実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemDeleteDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
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
 * 管理商品削除実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemDeleteDo extends Tv_ActionAdminOnly
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