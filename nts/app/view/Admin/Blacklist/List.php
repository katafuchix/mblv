<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ブラックリスト一覧ページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBlacklistList extends Tv_ListViewClass
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
			// ブラックリスト者ユーザID検索
			'black_list_user_id' => array(
				'column' => 'fu.user_id',
			),
			// ブラックリスト対象者ユーザID検索
			'black_list_deny_user_id' => array(
				'column' => 'tu.user_id',
			),
			// ブラックリスト者ユーザニックネーム検索
			'black_list_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// ブラックリスト対象者ユーザニックネーム検索
			'black_list_fail_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// ブラックリストID検索
			'black_list_id' => array(
				'column' => 'bl.black_list_id',
			),
			// ブラックリストステータス検索
			'black_list_status' => array(
				'column' => 'bl.black_list_status',
			),
			// ブラックリスト監視ステータス検索
			'black_list_checked' => array(
				'column' => 'bl.black_list_checked',
			),
			// 投稿日時検索
			'black_list_created' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_regist_time',
			),
			// 更新日時検索
			'black_list_updated' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_update_time',
			),
			// 削除日時検索
			'black_list_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'bl.black_list_delete_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = bl.black_list_user_id AND tu.user_id = bl.black_list_deny_user_id ';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as black_list_user_id,fu.user_nickname as black_list_user_nickname,
				tu.user_id as black_list_deny_user_id,tu.user_nickname as black_list_deny_user_nickname,
				bl.black_list_id,bl.black_list_status,bl.black_list_checked,bl.black_list_regist_time,bl.black_list_update_time,bl.black_list_delete_time',
			'sql_from'	=> 'user as fu,user as tu,black_list as bl',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'bl.black_list_update_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>