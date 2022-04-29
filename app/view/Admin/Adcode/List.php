<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告コードポータル画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAdcodeList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_adcode_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'ad_code',
			'sql_where'	=> 'ad_code_status > 0',
			'sql_order'	=> 'ad_code_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>