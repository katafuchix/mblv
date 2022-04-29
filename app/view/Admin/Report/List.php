<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 通報一覧編集ページビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminReportList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// 通報者ユーザID検索
			'report_user_id' => array(
				'column' => 'ru.user_id',
			),
			// 通報対象者ユーザID検索
			'report_fail_user_id' => array(
				'column' => 'rfu.user_id',
			),
			// 通報者ユーザニックネーム検索
			'report_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'ru.user_nickname',
			),
			// 通報対象者ユーザニックネーム検索
			'report_fail_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'rfu.user_nickname',
			),
			// 通報ID検索
			'report_id' => array(
				'column' => 'r.report_id',
			),
			// 通報本文検索
			'report_message' => array(
				'type' => 'LIKE',
				'column' => 'r.report_message',
			),
			// 通報ステータス検索
			'report_status' => array(
				'column' => 'r.report_status',
			),
			// 通報監視ステータス検索
			'report_checked' => array(
				'column' => 'r.report_checked',
			),
			// 投稿日時検索
			'report_created' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_created_time',
			),
			// 更新日時検索
			'report_updated' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_updated_time',
			),
			// 削除日時検索
			'report_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('report_status') == "") $this->af->set('report_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' ru.user_id = r.report_user_id AND rfu.user_id = r.report_fail_user_id ';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 'ru.user_id as report_user_id,ru.user_nickname as report_user_nickname,' .
				'rfu.user_id as report_fail_user_id,rfu.user_nickname as report_fail_user_nickname,' .
				'r.report_id,r.report_message,r.report_status,r.report_checked,r.report_created_time,r.report_updated_time,r.report_deleted_time',
			'sql_from'		=> 'user as ru,user as rfu,report as r',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'r.report_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>