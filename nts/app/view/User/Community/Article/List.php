<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ記事一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// リストビュー
		$sqlWhere = "ca.community_id = ? AND ca.community_article_status = 1 AND ca.user_id = u.user_id AND u.user_status = 2";
		$sqlValues = array($this->af->get('community_id'));
		
		$this->listview = array(
			'action_name'	=> 'user_community_article_list',
			'sql_select'
				=> 'ca.community_article_id, ca.community_article_title, ca.community_article_comment_num',
			'sql_from'		=> 'community_article ca,user u',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'ca.community_article_comment_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
		
		
	}
}
?>
