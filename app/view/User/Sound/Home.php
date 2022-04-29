<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザサウンドホーム画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSoundHome extends Tv_ListViewClass
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
			'action_name'	=> 'user_sound_home',
			'sql_select'	=> '*',
			'sql_from'		=> 'sound as a,user_sound as ua,sound_category as ac',
			'sql_where'		=> 'ua.user_id = ? AND ua.user_sound_status <> 0 AND ua.sound_id = a.sound_id AND a.sound_status = 1 AND a.sound_category_id = ac.sound_category_id',
			'sql_order'		=> 'ua.user_sound_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'		=> 9,
		);
	}
}
?>