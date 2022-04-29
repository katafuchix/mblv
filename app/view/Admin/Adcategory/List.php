<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告カテゴリポータル画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAdcategoryList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 広告カテゴリ一覧の取得
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_adcategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'ad_category',
			'sql_where'		=> 'ad_category_status <> 0',
			'sql_order'		=> 'ad_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>