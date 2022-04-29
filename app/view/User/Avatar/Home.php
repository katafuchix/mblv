<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバターホーム画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarHome extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_avatar_home',
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id',
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'		=> 6,
		);
	}
}
?>