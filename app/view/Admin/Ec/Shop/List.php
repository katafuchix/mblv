<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ショップ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcShopList extends Tv_ListViewClass
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
			// shop ID検索
			'shop_id' => array(
				'column' => 'shop_id',
			),
			// shop name検索
			'shop_name' => array(
				'type' => 'LIKE',
				'column' => 'shop_name',
			),
			// ステータス検索
			'shop_status' => array(
				'column' => 'shop_status',
			),
			// 作成日時検索
			'shop_created' => array(
				'type' => 'PERIOD',
				'column' => 'shop_created_time',
			),
			// 更新日時検索
			'shop_updated' => array(
				'type' => 'PERIOD',
				'column' => 'shop_updated_time',
			),
			// 削除日時検索
			'shop_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'shop_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('shop_status') == "") $this->af->set('shop_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' shop ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'shop_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>