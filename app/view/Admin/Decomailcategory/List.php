<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理デコメールカテゴリ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminDecomailcategoryList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// デコメールカテゴリ一覧の取得
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_decomailcategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_status <> 0',
			'sql_order'		=> 'decomail_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>