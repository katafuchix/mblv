<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザデコメール一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserDecomailList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// decomail category id
			'decomail_category_id' => array(
				'column' => 'a.decomail_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// キーワード検索
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.decomail_name LIKE ? OR a.decomail_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND a.decomail_status = 1 AND ac.decomail_category_id = a.decomail_category_id';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.decomail_start_status = 0 OR (a.decomail_start_status = 1 AND a.decomail_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.decomail_end_status = 0 OR (a.decomail_end_status = 1 AND a.decomail_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.decomail_stock_status = 0 OR (a.decomail_stock_status = 1 AND a.decomail_stock_num > 0)) ";
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_decomail_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'decomail as a, decomail_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.decomail_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 9,
		);
		// カテゴリ情報の取得
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('decomail_category'));
	}
}
?>
