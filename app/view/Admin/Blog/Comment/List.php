<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理日記コメント一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogCommentList extends Tv_ListViewClass
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
			// 日記コメントID検索
			'blog_comment_id' => array(
				'column' => 'bc.blog_comment_id',
			),
			// 日記コメント本文検索
			'blog_comment_body' => array(
				'type' => 'LIKE',
				'column' => 'bc.blog_comment_body',
			),
			//コメントしたユーザID検索
			'user_id' => array(
				'column' => 'bc.user_id',
			),
			// コメントしたユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// 日記コメントステータス検索
			'blog_comment_status' => array(
				'column' => 'bc.blog_comment_status',
			),
			// 日記コメント監視ステータス検索
			'blog_comment_checked' => array(
				'column' => 'bc.blog_comment_checked',
			),
			// 投稿日時検索
			'blog_comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_created_time',
			),
			// 更新日時検索
			'blog_comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_updated_time',
			),
			// 削除日時検索
			'blog_comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_deleted_time',
			),
		);
		
		// 初期画面ではステータスが「有効」のデータのみ取得する
		if($this->af->get('blog_comment_status') == "") $this->af->set('blog_comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// 結合条件
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' bc.user_id=u.user_id AND bc.blog_article_id=ba.blog_article_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> 
				'u.user_nickname,
				ba.blog_article_id,ba.blog_article_title,ba.blog_article_body,bc.image_id,
				bc.blog_comment_id,bc.user_id,bc.blog_comment_body,bc.blog_comment_status,bc.blog_comment_checked,bc.blog_comment_created_time,bc.blog_comment_updated_time,bc.blog_comment_deleted_time',
			//'sql_from'	=> 'user as u,blog_comment as bc,blog_article as ba',
			'sql_from'	=> 'user as u,blog_article as ba, blog_comment as bc LEFT JOIN image ON bc.image_id = image.image_id ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'bc.blog_comment_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>