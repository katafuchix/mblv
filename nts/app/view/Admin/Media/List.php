<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理メディア一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminMediaList extends Tv_ListViewClass
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
			'action_name'	=> 'admin_media_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'media',
			'sql_where'	=> ' media_status > 0',
			'sql_order'	=> 'media_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>
