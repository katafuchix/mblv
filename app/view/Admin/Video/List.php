<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminVideoList extends Tv_ListViewClass
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
			// video_id 検索
			'video_id' => array(
				'column' => 'video_id',
			),
			// video_name 検索
			'video_name' => array(
				'type' => 'LIKE',
				'column' => 'video_name',
			),
			// video category id
			'video_category_id' => array(
				'column' => 'video_category_id',
			),
			// video desc
			'video_desc' => array(
				'type' => 'LIKE',
				'column' => 'video_desc',
			),
			// 配信数ステータス検索
			'video_stock_status' => array(
				'column' => 'video_stock_status',
			),
			// 配信数検索
			'video_stock_num' => array(
				'column' => 'video_stock_num',
			),
			// 配信開始テータス検索
			'video_start_status' => array(
				'column' => 'video_start_status',
			),
			// 配信開始日時検索
			'video_start' => array(
				'type' => 'PERIOD',
				'column' => 'video_start_time',
			),
			// 配信終了テータス検索
			'video_end_status' => array(
				'column' => 'video_end_status',
			),
			// 配信終了日時検索
			'video_end' => array(
				'type' => 'PERIOD',
				'column' => 'video_end_time',
			),
			// テータス検索
			'video_status' => array(
				'column' => 'video_status',
			),
			// 作成日時検索
			'video_created' => array(
				'type' => 'PERIOD',
				'column' => 'video_created_time',
			),
			// 更新日時検索
			'video_updated' => array(
				'type' => 'PERIOD',
				'column' => 'video_updated_time',
			),
			// 削除日時検索
			'video_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'video_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('video_status') == "") $this->af->set('video_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_video_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'video',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'video_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListViewを実行する
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// カテゴリ取得
		$u = & $this->backend->getManager('Util');
		$sc = $u->getAttrList('video_category');
		
		// カテゴリ名をセットする
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['video_category_name'] = $sc[$v['video_category_id']]['name'];
		}
		
		// テンプレートに引き渡す
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('video_category_id')) $this->af->setApp('video_category_name', $sc[$this->af->get('video_category_id')]['name']);

	}
}
?>