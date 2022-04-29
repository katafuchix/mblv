<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理商品登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemAdd extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'item_category_id' => array(
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> 'Util, item_category',
		),
	);
}

/**
 * 管理商品登録アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemAdd extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// まだカテゴリがない場合は商品を作れない
		$db = $this->backend->getDB();
		$sql = "SELECT count(item_category_id)as cnt FROM item_category where item_category_status = 1 ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if( $rows[0]['cnt'] == 0 ){
			$this->ae->add(null, '', E_ADMIN_ITEM_ITEM_CATEGORY_NOT_FOUND);
			return 'admin_ec_itemcategory_list';
		}
		
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
		// 複数カテゴリ選択のためセレクトボックスのデフォルト値を設定します
		$category_id = $this->af->get('item_category_id');
		for($i=1;$i<=5;$i++){
			$this->af->set('item_category_id' . $i, $category_id);
		}
		
		$um = $this->backend->getManager('Util');
		
		// ショップ名を出力
		$ifnull_shop_id = $this->af->get('shop_id');
		// shop_idがない場合　category_idからshop_idを取得する。category_idもなければ終了
		if(!$this->af->get('shop_id')){
			if(!$this->af->get('item_category_id')){
				return;
			}else{
				$o =& new Tv_ItemCategory($this->backend, 'item_category_id', $this->af->get('item_category_id'));
				$ifnull_shop_id = $o->get('shop_id');
			}
		}
		// ショップ情報の取得
		$s =& new Tv_Shop($this->backend, 'shop_id', $ifnull_shop_id);
		// ショップ名とショップidをform内に渡す
		$s->exportForm();
		
		return 'admin_ec_item_add';
	}
}
?>