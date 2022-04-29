<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメール一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminDecomailList extends Tv_ListViewClass 
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// decomail_id 検索
			'decomail_id' => array(
				'column' => 'decomail_id',
			),
			// decomail_name 検索
			'decomail_name' => array(
				'type' => 'LIKE',
				'column' => 'decomail_name',
			),
			// decomail category id
			'decomail_category_id' => array(
				'column' => 'decomail_category_id',
			),
			// decomail desc
			'decomail_desc' => array(
				'type' => 'LIKE',
				'column' => 'decomail_desc',
			),
			// 配信数ステータス検索
			'decomail_stock_status' => array(
				'column' => 'decomail_stock_status',
			),
			// 配信数検索
			'decomail_stock_num' => array(
				'column' => 'decomail_stock_num',
			),
			// 配信開始テータス検索
			'decomail_start_status' => array(
				'column' => 'decomail_start_status',
			),
			// 配信開始日時検索
			'decomail_start' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_start_time',
			),
			// 配信終了テータス検索
			'decomail_end_status' => array(
				'column' => 'decomail_end_status',
			),
			// 配信終了日時検索
			'decomail_end' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_end_time',
			),
			// テータス検索
			'decomail_status' => array(
				'column' => 'decomail_status',
			),
			// 作成日時検索
			'decomail_created' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_created_time',
			),
			// 更新日時検索
			'decomail_updated' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_updated_time',
			),
			// 削除日時検索
			'decomail_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_decomail_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'decomail',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'decomail_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		// カテゴリ取得
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('dc',$u->getAttrList('decomail_category'));
	}
}
?>