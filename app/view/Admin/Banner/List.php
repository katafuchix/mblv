<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理バナー一覧アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBannerList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// バナー一覧の取得
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_banner_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'banner',
			'sql_where'		=> 'banner_status = 1',
			'sql_order'		=> 'banner_updated_time DESC',
			'sql_values'	=> $values,
		);
	}
}
?>