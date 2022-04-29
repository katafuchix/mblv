<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理日記記事一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogArticleList extends Tv_ListViewClass
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
			// ユーザID検索
			'user_id' => array(
				'column' => 'ba.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// 日記記事ID検索
			'blog_article_id' => array(
				'column' => 'ba.blog_article_id',
			),
			// 日記記事タイトル検索
			'blog_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ba.blog_article_title',
			),
			// 日記記事本文検索
			'blog_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ba.blog_article_body',
			),
			// 日記記事ステータス検索
			'blog_article_status' => array(
				'column' => 'ba.blog_article_status',
			),
			// 日記記事監視ステータス検索
			'blog_article_checked' => array(
				'column' => 'ba.blog_article_checked',
			),
			// 投稿日時検索
			'blog_article_created' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_created_time',
			),
			// 更新日時検索
			'blog_article_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_updated_time',
			),
			// 削除日時検索
			'blog_article_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_deleted_time',
			),
			// 公開設定検索
			'blog_article_public' => array(
				'column' => 'ba.blog_article_public',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('blog_article_status') == "") $this->af->set('blog_article_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = ba.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,
				ba.blog_article_id,ba.blog_article_title,ba.blog_article_body,ba.blog_article_status,ba.blog_article_checked,ba.blog_article_created_time,ba.blog_article_updated_time,ba.blog_article_deleted_time,ba.blog_article_public,
				ba.image_id',
			//'sql_from'	=> 'user as u,blog_article as ba',
			'sql_from'	=> 'user as u,blog_article as ba LEFT JOIN image ON ba.image_id = image.image_id ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ba.blog_article_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>