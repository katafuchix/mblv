<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理トゥイッターお題一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminThemaList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */

	function preforward()
	{
		// トゥイッターお題一覧の取得
		$this->listview = array(
			'action_name'	=> 'admin_twitter_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'thema',
			'sql_where'		=> 'thema_status <> 0',
			'sql_order'		=> 'thema_created_time DESC',
			'sql_num'	=> 20,
		);
	}
}
?>
