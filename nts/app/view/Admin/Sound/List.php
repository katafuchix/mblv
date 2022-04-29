<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理サウンド一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminsoundList extends Tv_ListViewClass
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
			// sound_id 検索
			'sound_id' => array(
				'column' => 'sound_id',
			),
			// sound_name 検索
			'sound_name' => array(
				'type' => 'LIKE',
				'column' => 'sound_name',
			),
			// sound category id
			'sound_category_id' => array(
				'column' => 'sound_category_id',
			),
			// sound desc
			'sound_desc' => array(
				'type' => 'LIKE',
				'column' => 'sound_desc',
			),
			// 配信数ステータス検索
			'sound_stock_status' => array(
				'column' => 'sound_stock_status',
			),
			// 配信数検索
			'sound_stock_num' => array(
				'column' => 'sound_stock_num',
			),
			// 配信開始テータス検索
			'sound_start_status' => array(
				'column' => 'sound_start_status',
			),
			// 配信開始日時検索
			'sound_start' => array(
				'type' => 'PERIOD',
				'column' => 'sound_start_time',
			),
			// 配信終了テータス検索
			'sound_end_status' => array(
				'column' => 'sound_end_status',
			),
			// 配信終了日時検索
			'sound_end' => array(
				'type' => 'PERIOD',
				'column' => 'sound_end_time',
			),
			// テータス検索
			'sound_status' => array(
				'column' => 'sound_status',
			),
			// 作成日時検索
			'sound_created' => array(
				'type' => 'PERIOD',
				'column' => 'sound_created_time',
			),
			// 更新日時検索
			'sound_updated' => array(
				'type' => 'PERIOD',
				'column' => 'sound_updated_time',
			),
			// 削除日時検索
			'sound_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'sound_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_sound_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'sound',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'sound_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		// カテゴリ取得
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('sc',$u->getAttrList('sound_category'));
	}
}
?>