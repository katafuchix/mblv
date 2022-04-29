<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ポイント画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointHome extends Tv_ListViewClass
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
		
		// 現在のポイントを取得
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$this->af->setApp('user', $o->getNameObject());
		
		// ユーザポイント情報を取得
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_point_home',
			'sql_select'	=> '*',
			'sql_from'	=> 'point',
			'sql_where'	=> 'user_id = ? AND point <> 0 AND point_status <> 0',
			'sql_order'	=> 'point_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'	=> 10,
		);
	}
}
?>