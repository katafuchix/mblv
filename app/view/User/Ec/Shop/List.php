<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ショップ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcShopList extends  Tv_ListViewClass
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
			// shop_name
			'shop_name' => array(
				'type'		=> 'LIKE',
				'column'	=> 'shop_name',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// ステータスが有効なもののみ表示する
		$sqlWhere .= ' AND shop_status = 1 ';
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_ec_shop_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'shop',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'shop_id DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}?>