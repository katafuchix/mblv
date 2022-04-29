<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 管理広告一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAdList extends Tv_ListViewClass
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
			// ad_id 検索
			'ad_id' => array(
				'column' => 'ad_id',
			),
			// ad_name 検索
			'ad_name' => array(
				'type' => 'LIKE',
				'column' => 'ad_name',
			),
			// ad category id
			'ad_category_id' => array(
				'column' => 'ad_category_id',
			),
			// ad desc
			'ad_desc' => array(
				'type' => 'LIKE',
				'column' => 'ad_desc',
			),
			// 配信数ステータス検索
			'ad_stock_status' => array(
				'column' => 'ad_stock_status',
			),
			// 配信数検索
			'ad_stock_num' => array(
				'column' => 'ad_stock_num',
			),
			// 配信開始テータス検索
			'ad_start_status' => array(
				'column' => 'ad_start_status',
			),
			// 配信開始日時検索
			'ad_start' => array(
				'type' => 'PERIOD',
				'column' => 'ad_start_time',
			),
			// 配信終了テータス検索
			'ad_end_status' => array(
				'column' => 'ad_end_status',
			),
			// 配信終了日時検索
			'ad_end' => array(
				'type' => 'PERIOD',
				'column' => 'ad_end_time',
			),
			// テータス検索
			'ad_status' => array(
				'column' => 'ad_status',
			),
			// 作成日時検索
			'ad_created' => array(
				'type' => 'PERIOD',
				'column' => 'ad_created_time',
			),
			// 更新日時検索
			'ad_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ad_updated_time',
			),
			// 削除日時検索
			'ad_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ad_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> 'ad',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ad_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		// カテゴリ取得
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$u->getAttrList('ad_category'));
	}
}
?>