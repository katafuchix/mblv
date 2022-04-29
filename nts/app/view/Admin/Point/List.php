<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ポイント一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminPointList extends Tv_ListViewClass
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
			// ユーザID検索
			'user_id' => array(
				'column' => 'u.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ポイントタイプ
			'point_type' => array(
				'column' => 'p.point_type',
			),
			// ポイントID
			'point_id' => array(
				'column' => 'p.point_id',
			),
			// ポイントサブID
			'point_sub_id' => array(
				'column' => 'p.point_sub_id',
			),
			// ユーザサブID
			'user_sub_id' => array(
				'column' => 'p.user_sub_id',
			),
			// ポイント備考
			'point_memo' => array(
				'type'	=> 'LIKE',
				'column' => 'p.point_memo',
			),
			// ポイントステータス
			'point_status' => array(
				'column' => 'p.point_status',
			),
			// 作成日時検索
			'point_created' => array(
				'type' => 'PERIOD',
				'column' => 'p.point_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = p.user_id';
		
		// ページャ
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'user as u,point as p',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'p.point_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>