<?php
/**
 * Top.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * ポータル画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserTop extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ログイン時のみ全体ユーザーの最新日記5件を取得する
		$user_session = $this->session->get('user');
		if($user_session['user_id']){
			$um = $this->backend->getManager('Util');
			// 全体の日記の一覧を取得
			// status: 1 公開のみ
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
					'sql_num'		=> 5,
			);
			$wholediaryList = $um->dataQuery($param);
			if(count($wholediaryList)>0){
				$this->af->setApp('whole_blog_article_list', $wholediaryList);
			}
		}
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}

?>
