<?php
/**
 * Dl.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームダウンロード画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameDl extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ゲーム情報取得
		$a =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$a->exportForm();
		
		// リストビュー
		$sqlWhere = 'c.comment_type=2 AND c.comment_subid=? AND c.comment_status=1' .
			' AND u.user_id=c.user_id AND u.user_status = ?';
		$sqlValues = array($this->af->get('game_id'),2);
		$this->listview = array(
			'action_name'	=> 'user_game_buy',
			'sql_select'
				=> 'u.user_id,u.user_nickname,u.image_id as user_image_id,' .
				'c.comment_id,c.comment_created_time,c.comment_body',
			'sql_from'		=> 'user as u, comment as c',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.comment_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 5,
		);
	}
}
?>