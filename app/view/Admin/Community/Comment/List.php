<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティコメント一覧ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityCommentList extends Tv_ListViewClass
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
			// ユーザID検索
			'user_id' => array(
				'column' => 'cc.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// コミュニティトコメントID検索
			'community_comment_id' => array(
				'column' => 'cc.community_comment_id',
			),
			// コミュニティトコメント本文検索
			'community_comment_body' => array(
				'column' => 'cc.community_comment_body',
			),
			// コミュニティトピックID検索
			'community_article_id' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_id',
			),
			// コミュニティトピックタイトル検索
			'community_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_title',
			),
			// コミュニティトピック本文索
			'community_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_body',
			),
			// コミュニティコメントステータス検索
			'community_comment_status' => array(
				'column' => 'cc.community_comment_status',
			),
			// コミュニティトピック監視ステータス検索
			'community_article_checked' => array(
				'column' => 'ca.community_article_checked',
			),
			// 作成日時検索
			'community_comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_created_time',
			),
			// 更新日時検索
			'community_comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_updated_time',
			),
			// 削除日時検索
			'community_comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('community_comment_status') == "") $this->af->set('community_comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' cc.community_article_id = ca.community_article_id AND cc.user_id = u.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,u.user_status,
				cc.community_comment_id,cc.community_comment_body,cc.community_comment_status,cc.community_comment_checked,cc.community_comment_created_time,cc.community_comment_updated_time,cc.community_comment_deleted_time,
				ca.community_article_id,ca.community_article_title,ca.community_article_body,cc.image_id',
			'sql_from'	=> 'user as u,community_article as ca,community_comment as cc LEFT JOIN image ON cc.image_id = image.image_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'cc.community_comment_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>