<?php
/**
 * File.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ファイル管理画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminFile extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_file',
			'sql_select'	=> '*',
			'sql_from'		=> 'file',
			'sql_where'		=> 'file_status = 1',
			'sql_order'		=> 'file_id DESC',
			'sql_values'	=> array(),
			'sql_num'		=> 5,
		);
	}
}
?>