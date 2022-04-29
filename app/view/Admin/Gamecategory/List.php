<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲームカテゴリ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminGamecategoryList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */

	function preforward()
	{
		// ゲームカテゴリ一覧の取得
		$values = array();
		$this->listview = array(
			'action_name'	=> 'admin_gamecategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'game_category',
			'sql_where'		=> 'game_category_status <> 0',
			'sql_order'		=> 'game_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>