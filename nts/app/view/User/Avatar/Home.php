<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバターホーム画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarHome extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		// 検索条件
		$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
		$sqlValues = array($user['user_id']);
		
		// 着用中アバター取得
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere . ' AND ua.user_avatar_wear = 1',
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('user_avatar_wear_list', $r); 
		
		// 検索キーワード
		if($this->af->get('keyword')){
			$sqlWhere .= ' AND (a.avatar_name LIKE ? OR a.avatar_desc LIKE ?)';
			$sqlValues[] = '%%' . $this->af->get('keyword') . '%%';
			$sqlValues[] = '%%' . $this->af->get('keyword') . '%%';
		}
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_avatar_home',
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
			'sql_num'		=> 6,
		);
	}
}
?>
