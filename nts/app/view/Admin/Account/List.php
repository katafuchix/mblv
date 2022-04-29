<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理者アカウント一覧ページビュークラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_View_AdminAccountList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access public 
	 */
	function preforward()
	{
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_account_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'admin',
			'sql_where'	=> 'admin_status > 0',
			'sql_order'	=> 'admin_id DESC',
			'sql_values'	=> array(),
		);
		
	}
}
?>
