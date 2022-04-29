<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * コメント一覧画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommentList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// コメントを取得
		// リストビュー
		$sqlWhere = 'comment.comment_type = ? ' .
			'AND comment.comment_subid = ? ' .
			'AND comment.comment_status = 1';
		$sqlValues = array(
			$this->af->get('comment_type'),
			$this->af->get('comment_subid')
		);
		
		$this->listview = array(
			'action_name'	=> 'user_comment_list',
			'sql_select'	=>
				'comment.comment_id,comment.comment_body,
					comment.comment_created_time,user.user_nickname,user.user_id',
			'sql_from'		=> 'comment left join user on comment.user_id = user.user_id',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'comment.comment_id DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 10,
		);
	}
}

?>
