<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コメント一覧ビュークラス
 * 
 * @author     Technovarth
 * @ac.ss public
 * @package    MBLV
 */
class Tv_View_AdminCommentList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @ac.ss public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// ユーザID検索
			'user_id' => array(
				'column' => 'c.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// コメントID検索
			'comment_id' => array(
				'column' => 'c.comment_id',
			),
			// コメント本文検索
			'comment_body' => array(
				'type' => 'LIKE',
				'column' => 'c.comment_body',
			),
			// コメントテータス検索
			'comment_status' => array(
				'column' => 'c.comment_status',
			),
			// コメント監視ステータス検索
			'comment_checked' => array(
				'column' => 'c.comment_checked',
			),
			// 作成日時検索
			'comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_created_time',
			),
			// 更新日時検索
			'comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_updated_time',
			),
			// 削除日時検索
			'comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('comment_status') == "") $this->af->set('comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' c.user_id = u.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,u.user_status,
				c.comment_id,c.comment_body,c.comment_status,c.comment_checked,c.comment_created_time,c.comment_updated_time,c.comment_deleted_time',
			'sql_from'	=> 'user as u,comment as c',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'c.comment_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>