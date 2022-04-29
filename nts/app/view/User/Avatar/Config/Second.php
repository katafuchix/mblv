<?php
/**
 * Second.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバターページ2画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarConfigSecond extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 選択条件
		$sqlWhere = "ac.avatar_system_category_id = 3 AND ac.avatar_category_id = a.avatar_category_id AND a.first_avatar = 1";
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// ユーザ情報を取得する
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		// 性別情報を追加する
		// 「男性」ならば「女性用」以外を表示
		if($u->get('user_sex')==1){
			$exclude_sex = 2;
		}
		// 「女性」ならば「男性用」以外を表示
		elseif($u->get('user_sex')==2){
			$exclude_sex = 1;
		}
		$sqlWhere .= " AND a.avatar_sex_type <> ?";
		$sqlValues[] = $exclude_sex;
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND a.avatar_status = 1 AND ac.avatar_category_id = a.avatar_category_id';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_start_status = 0 OR (a.avatar_start_status = 1 AND a.avatar_start_time > now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_end_status = 0 OR (a.avatar_end_status = 1 AND a.avatar_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_stock_status = 0 OR (a.avatar_stock_status = 1 AND a.avatar_stock_num < 0)) ";
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_avatar_config_second',
			'sql_select'	=> '*',
			'sql_from'	=> 'avatar as a, avatar_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.avatar_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 6,
		);
	}
}
?>
