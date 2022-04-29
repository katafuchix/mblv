<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲーム一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameList extends Tv_ListViewClass
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
			// game category id
			'game_category_id' => array(
				'column' => 'a.game_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// キーワード検索
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.game_name LIKE ? OR a.game_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND a.game_status = 1 AND ac.game_category_id = a.game_category_id';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.game_start_status = 0 OR (a.game_start_status = 1 AND a.game_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.game_end_status = 0 OR (a.game_end_status = 1 AND a.game_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.game_stock_status = 0 OR (a.game_stock_status = 1 AND a.game_stock_num > 0)) ";
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_game_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'game as a, game_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.game_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 9,
		);
		// カテゴリ情報の取得
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('game_category'));
	}
}
?>