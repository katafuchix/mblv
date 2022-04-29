<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティトピック一覧ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityArticleList extends Tv_ListViewClass
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
			// ユーザID検索
			'user_id' => array(
				'column' => 'ca.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// コミュニティトピックタイトル索
			'community_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_title',
			),
			// コミュニティトピック本文索
			'community_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_body',
			),
			// コミュニティトピックステータス検索
			'community_article_status' => array(
				'column' => 'ca.community_article_status',
			),
			// コミュニティトピック監視ステータス検索
			'community_article_checked' => array(
				'column' => 'ca.community_article_checked',
			),
			// 作成日時検索
			'community_article_created' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_created_time',
			),
			// 更新日時検索
			'community_article_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_updated_time',
			),
			// 削除日時検索
			'community_article_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		/*
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id=ca.user_id AND c.community_id=ca.community_id';
		*/
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,
				c.community_title,
				ca.community_article_id,ca.community_article_body,ca.community_article_title,ca.community_article_status,ca.community_article_checked,ca.community_article_created_time,ca.community_article_updated_time,ca.community_article_deleted_time',
			'sql_from'	=> 'community as c JOIN community_article as ca ON c.community_id=ca.community_id JOIN user as u ON u.user_id=ca.user_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ca.community_article_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>