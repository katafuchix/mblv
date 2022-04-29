<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メッセージ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminMessageList extends Tv_ListViewClass
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
			// 送信ユーザID検索
			'from_user_id' => array(
				'column' => 'fu.user_id',
			),
			// 受信ユーザID検索
			'to_user_id' => array(
				'column' => 'tu.user_id',
			),
			// 送信ユーザニックネーム検索
			'from_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'fu.user_nickname',
			),
			// 受信ユーザニックネーム検索
			'to_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'tu.user_nickname',
			),
			// メッセージID検索
			'message_id' => array(
				'column' => 'm.message_id',
			),
			// メッセージタイトル検索
			'message_title' => array(
				'type' => 'LIKE',
				'column' => 'm.message_title',
			),
			// メッセージ本文検索
			'message_body' => array(
				'type' => 'LIKE',
				'column' => 'm.message_body',
			),
			// メッセージステータス検索
			'message_status' => array(
				'column' => 'm.message_status',
			),
			// メッセージ監視ステータス検索
			'message_checked' => array(
				'column' => 'm.message_checked',
			),
			// 投稿日時検索
			'message_created' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_created_time',
			),
			// 更新日時検索
			'message_updated' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_updated_time',
			),
			// 削除日時検索
			'message_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'm.message_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('message_status') == "") $this->af->set('message_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' fu.user_id = m.from_user_id AND tu.user_id = m.to_user_id ';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'fu.user_id as from_user_id,fu.user_nickname as from_user_nickname,
				tu.user_id as to_user_id,tu.user_nickname as to_user_nickname,
				m.message_id,m.message_title,m.message_body,m.message_status,m.message_checked,m.message_created_time,m.image_id',
			'sql_from'	=> 'user as fu,user as tu,message as m LEFT JOIN image ON m.image_id = image.image_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'm.message_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>