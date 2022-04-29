<?php
/**
 * Category.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * カテゴリ画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcCategory extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// パラメタの取得
		$page = $this->af->get('page');
		$item_category_id = $this->af->get('item_category_id');
		
		//db
		$db = $this->backend->getDB();
		
		// アイテム全件取得
		$sqlValues = array();
		// カテゴリテーブルとアイテムテーブルを指定
		if($this->af->get('item_category_id') != ''){
			$sqlWhere .= ' (item_category_id = ? OR item_category_id REGEXP ? OR item_category_id REGEXP ? OR item_category_id REGEXP ?) AND ';
			$sqlValues[] = $this->af->get('item_category_id');
			$sqlValues[] = '^' . $this->af->get('item_category_id') . ',';
			$sqlValues[] = ',' . $this->af->get('item_category_id') . '$';
			$sqlValues[] = ',' . $this->af->get('item_category_id') . ',';
		}
		
		// 有効なステータスの商品のみ取得する
		$sqlWhere .= 'item_status = 1';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_ec_category',
			'sql_select'	=> '*',
			'sql_from'		=> 'item',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $this->offset,
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
		
		// カテゴリ情報の取得
		$o =& new Tv_ItemCategory($this->backend,'item_category_id',$this->af->get('item_category_id'));
		$this->af->setApp('item_category_name',$o->get('item_category_name'));
		$this->af->setApp('item_category_image1',$o->get('item_category_image1'));
		$o->exportForm();
		// カテゴリフリースペースコンテンツを生成
		$um = $this->backend->getManager('Util');
		$this->af->setAppNe('item_category_contents_body', $um->convertHtml($o->get('item_category_contents_body')));
		
		//shop_name get
		$sql = "select s.shop_id, s.shop_name from shop s join item_category c on s.shop_id = c.shop_id where item_category_id = ? ";
		$values = array($this->af->get('item_category_id'));
		$r = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('shop_id', $r[0]['shop_id']);
		$this->af->setApp('shop_name', $r[0]['shop_name']);
	}
}
?>