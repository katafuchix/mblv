<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲーム一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminGameList extends Tv_ListViewClass 
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
			// game_id 検索
			'game_id' => array(
				'column' => 'game_id',
			),
			// game_name 検索
			'game_name' => array(
				'type' => 'LIKE',
				'column' => 'game_name',
			),
			// game category id
			'game_category_id' => array(
				'column' => 'game_category_id',
			),
			// game desc
			'game_desc' => array(
				'type' => 'LIKE',
				'column' => 'game_desc',
			),
			// 配信数ステータス検索
			'game_stock_status' => array(
				'column' => 'game_stock_status',
			),
			// 配信数検索
			'game_stock_num' => array(
				'column' => 'game_stock_num',
			),
			// 配信開始テータス検索
			'game_start_status' => array(
				'column' => 'game_start_status',
			),
			// 配信開始日時検索
			'game_start' => array(
				'type' => 'PERIOD',
				'column' => 'game_start_time',
			),
			// 配信終了テータス検索
			'game_end_status' => array(
				'column' => 'game_end_status',
			),
			// 配信終了日時検索
			'game_end' => array(
				'type' => 'PERIOD',
				'column' => 'game_end_time',
			),
			// テータス検索
			'game_status' => array(
				'column' => 'game_status',
			),
			// 作成日時検索
			'game_created' => array(
				'type' => 'PERIOD',
				'column' => 'game_created_time',
			),
			// 更新日時検索
			'game_updated' => array(
				'type' => 'PERIOD',
				'column' => 'game_updated_time',
			),
			// 削除日時検索
			'game_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'game_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('game_status') == "") $this->af->set('game_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_game_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'game',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'game_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListViewを実行する
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// カテゴリ取得
		$u = & $this->backend->getManager('Util');
		$gc = $u->getAttrList('game_category');
		
		// ゲームカテゴリ名をセットする
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['game_category_name'] = $gc[$v['game_category_id']]['name'];
		}
		
		// テンプレートに引き渡す
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('game_category_id')) $this->af->setApp('game_category_name', $gc[$this->af->get('game_category_id')]['name']);
	}
}
?>