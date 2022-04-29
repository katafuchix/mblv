<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * BL一覧画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user');
		$user_id = $user_session['user_id'];
		
		// ユーザのニックネームを出力
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// BL一覧を取得
		$this->listview = array(
			'action_name'	=> 'user_blog_blacklist_list',
			'sql_select'	=> ' b.black_list_id, b.black_list_deny_user_id, u.user_nickname ',
			'sql_from'		=> ' black_list b , user u',
			'sql_where'		=> ' b.black_list_user_id = ? AND b.black_list_status = ? AND b.black_list_deny_user_id = u.user_id AND u.user_status = ?',
			'sql_values'	=> array( $user_id, 1 ,2),
			'sql_num'		=> 5,
		);
	}
}
?>