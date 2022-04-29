<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品カテゴリ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcItemcategoryList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// item_category ID検索
			'item_category_id' => array(
				'column' => 'item_category_id',
			),
			'shop_id' => array(
				'column' => 'shop_id',
			),
			// 名称検索
			'item_category_name' => array(
				'type' => 'LIKE',
				'column' => 'item_category_name',
			),
			// ステータス検索
			'item_category_status' => array(
				'column' => 'item_category_status',
			),
			// 作成日時検索
			'item_category_created' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_created_time',
			),
			// 更新日時検索
			'item_category_updated' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_updated_time',
			),
			// 削除日時検索
			'item_category_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('item_category_status') == "") $this->af->set('item_category_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' item_category ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'item_category_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>