<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバター一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAvatarList extends Tv_ListViewClass
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
			// avatar_id 検索
			'avatar_id' => array(
				'column' => 'a.avatar_id',
			),
			// avatar_name 検索
			'avatar_name' => array(
				'type' => 'LIKE',
				'column' => 'a.avatar_name',
			),
			// avatar category id
			'avatar_category_id' => array(
				'column' => 'a.avatar_category_id',
			),
			// avatar desc
			'avatar_desc' => array(
				'type' => 'LIKE',
				'column' => 'a.avatar_desc',
			),
			// 配信数ステータス検索
			'avatar_stock_status' => array(
				'column' => 'a.avatar_stock_status',
			),
			// 配信数検索
			'avatar_stock_num' => array(
				'column' => 'a.avatar_stock_num',
			),
			// 配信開始テータス検索
			'avatar_start_status' => array(
				'column' => 'a.avatar_start_status',
			),
			// 配信開始日時検索
			'avatar_start' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_start_time',
			),
			// 配信終了テータス検索
			'avatar_end_status' => array(
				'column' => 'a.avatar_end_status',
			),
			// 配信終了日時検索
			'avatar_end' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_end_time',
			),
			// テータス検索
			'avatar_status' => array(
				'column' => 'a.avatar_status',
			),
			// 作成日時検索
			'avatar_created' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_created_time',
			),
			// 更新日時検索
			'avatar_updated' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_updated_time',
			),
			// 削除日時検索
			'avatar_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 検索条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= 'a.avatar_category_id = ac.avatar_category_id';
		
		// ステータスの初期値
		if($this->af->get('avatar_status') == ''){
			$sqlWhere .= ' AND a.avatar_status = 1';
		}
		
		// アバターZ座標の検索
		if($this->af->get('avatar_z')){
			$sqlWhere .= ' AND (a.avatar_image1_z = ? OR a.avatar_image2_z = ?)';
			$sqlValues[] = $this->af->get('avatar_z');
			$sqlValues[] = $this->af->get('avatar_z');
		}
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_avatar_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'avatar as a,avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'a.avatar_updated_time DESC ',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>