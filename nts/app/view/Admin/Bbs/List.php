<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 伝言一覧編集ページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminbbsList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// 書き込みユーザID検索
			'from_user_id' => array(
				'column' => 'fu.user_id',
			),
			// 書き込まれたユーザID検索
			'to_user_id' => array(
				'column' => 'fu.user_id',
			),
			// 書き込みユーザニックネーム検索
			'from_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// 書き込まれたユーザニックネーム検索
			'to_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// 伝言ID検索
			'bbs_id' => array(
				'column' => 'mb.bbs_id',
			),
			// 伝言本文検索
			'message' => array(
				'type' => 'LIKE',
				'column' => 'mb.bbs_body',
			),
			// メッセージステータス検索
			'bbs_status' => array(
				'column' => 'mb.bbs_status',
			),
			// メッセージ監視ステータス検索
			'bbs_checked' => array(
				'column' => 'mb.bbs_checked',
			),
			// 投稿日時検索
			'bbs_created' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_created_time',
			),
			// 更新日時検索
			'bbs_updated' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_updated_time',
			),
			// 削除日時検索
			'bbs_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'mb.bbs_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = mb.from_user_id AND tu.user_id = mb.to_user_id ';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as from_user_id,fu.user_nickname as from_user_nickname,
				tu.user_id as to_user_id,tu.user_nickname as to_user_nickname,
				mb.bbs_id,mb.bbs_body,mb.bbs_status,mb.bbs_checked,mb.bbs_created_time,mb.bbs_updated_time,mb.bbs_deleted_time',
			'sql_from'	=> 'user as fu,user as tu,bbs as mb',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'mb.bbs_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>