<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理セグメント一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminSegmentList extends Tv_ListViewClass
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
			'action_name'	=> 'admin_segment_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'segment',
			'sql_where'	=> 'segment_status > 0',
			'sql_order'	=> 'segment_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>
