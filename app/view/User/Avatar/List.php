<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバターリスト画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// avatar category id
			'avatar_category_id' => array(
				'column' => 'a.avatar_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// キーワード検索
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.avatar_name LIKE ? OR a.avatar_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
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
		
		// ゲストユーザの場合は優先「-1」まで表示させる
		$priority = 1;
		if($u->get('user_guest_status') == 1) $priority = -1;
		$sqlWhere .= " AND ac.avatar_category_status = 1 AND ac.avatar_category_priority_id >= ?";
		$sqlValues[] = $priority;
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND a.avatar_status = 1 AND ac.avatar_category_id = a.avatar_category_id';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_start_status = 0 OR (a.avatar_start_status = 1 AND a.avatar_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_end_status = 0 OR (a.avatar_end_status = 1 AND a.avatar_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.avatar_stock_status = 0 OR (a.avatar_stock_status = 1 AND a.avatar_stock_num > 0)) ";
		
		// OEDER句
		$sort_key = 'avatar_updated_time';
		$sort_order =  'DESC';
		if($this->af->get('sort_key') && $this->af->get('sort_order')){
			$sort_key = $this->af->get('sort_key');
			$sort_order = $this->af->get('sort_order');
		}
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_avatar_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a, avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> "a.{$sort_key} {$sort_order}",
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 6,
		);
		// カテゴリ情報の取得
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>