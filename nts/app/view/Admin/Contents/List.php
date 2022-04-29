<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理フリーページ一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminContentsList extends Tv_ListViewClass
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
			// ID検索
			'contents_id' => array(
				'column' => 'contents_id',
			),
			// code検索
			'contents_code' => array(
				'type' => 'LIKE',
				'column' => 'contents_code',
			),
			// タイトル検索
			'contents_title' => array(
				'type' => 'LIKE',
				'column' => 'contents_title',
			),
			// 本文検索
			'contents_body' => array(
				'type' => 'LIKE',
				'column' => 'contents_body',
			),
			// ステータス検索
			'contents_status' => array(
				'column' => 'contents_status',
			),
			// 投稿日時検索
			'contents_created' => array(
				'type' => 'PERIOD',
				'column' => 'contents_created_time',
			),
			// 更新日時検索
			'contents_updated' => array(
				'type' => 'PERIOD',
				'column' => 'contents_updated_time',
			),
			// 削除日時検索
			'contents_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'contents_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_contents_list',
			'sql_select'	=> 	' * ',
			'sql_from'		=> 'contents',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'contents_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>
