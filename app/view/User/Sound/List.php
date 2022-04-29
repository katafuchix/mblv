<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザサウンド一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSoundList extends Tv_ListViewClass
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
			// sound category id
			'sound_category_id' => array(
				'column' => 'a.sound_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// キーワード検索
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.sound_name LIKE ? OR a.sound_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND a.sound_status = 1 AND ac.sound_category_id = a.sound_category_id';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.sound_start_status = 0 OR (a.sound_start_status = 1 AND a.sound_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (a.sound_end_status = 0 OR (a.sound_end_status = 1 AND a.sound_end_time > now())) ";
		// 配信終了数が有効なもののみ表示する
		$sqlWhere .= " AND (a.sound_stock_status = 0 OR (a.sound_stock_status = 1 AND a.sound_stock_num > 0)) ";
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_sound_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'sound as a, sound_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.sound_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 9,
		);
		// カテゴリ情報の取得
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('sound_category'));
	}
}
?>