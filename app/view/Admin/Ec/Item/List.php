<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcItemList extends Tv_ListViewClass
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
			// item_id 検索
			'item_id' => array(
				'column' => 'item_id',
			),
			// item_name 検索
			'item_name' => array(
				'type' => 'LIKE',
				'column' => 'item_name',
			),
			// item category id
			'item_category_id' => array(
				'type'	=> 'REGEXP',
				'column' => 'item_category_id',
			),
			// item detail
			'item_detail' => array(
				'type' => 'LIKE',
				'column' => 'item_detail',
			),
			// テータス検索
			'item_status' => array(
				'column' => 'item_status',
			),
			// 配信開始テータス検索
			'item_start_status' => array(
				'column' => 'item_start_status',
			),
			// 配信終了テータス検索
			'item_end_status' => array(
				'column' => 'item_end_status',
			),
			// 配信開始日時検索
			'item_start' => array(
				'type' => 'PERIOD',
				'column' => 'item_start_time',
			),
			// 配信終了テータス検索
			'item_end_status' => array(
				'column' => 'item_end_status',
			),
			// 配信終了日時検索
			'item_end' => array(
				'type' => 'PERIOD',
				'column' => 'item_end_time',
			),
			// テータス検索
			'item_status' => array(
				'column' => 'item_status',
			),
			// 作成日時検索
			'item_created' => array(
				'type' => 'PERIOD',
				'column' => 'item_created_time',
			),
			// 更新日時検索
			'item_updated' => array(
				'type' => 'PERIOD',
				'column' => 'item_updated_time',
			),
			// 削除日時検索
			'item_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'item_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('item_status') == "") $this->af->set('item_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_ec_item_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'item',
			'sql_where'	=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'item_updated_time DESC',
		);
		
		// ListViewを実行する
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// カテゴリ取得
		$u = & $this->backend->getManager('Util'); 
		$ic = $u->getAttrList('item_category');
		
		// カテゴリ名をセットする
		foreach($listview_data as $k=>$v){
			$category = explode(',',$v['item_category_id']);
			foreach($category as $k2=>$v2){
				if($ic[$v2]['name']){
					$listview_data[$k]['item_category_name'] .= "[".$ic[$v2]['name']."] ";
				}
			}
		}
		
		// テンプレートに引き渡す
		$this->af->setApp('listview_data', $listview_data);
//		if($this->af->get('item_category_id')) $this->af->setApp('item_category_name', $ic[$this->af->get('item_category_id')]['name']);
	}
}
?>