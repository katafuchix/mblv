<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ニュース一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminNewsList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */

	function preforward()
	{
		// ニュース一覧の取得
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'news',
			'sql_where'	=> '1',
			'sql_order'	=> 'news_id DESC',
			'sql_values' => array(),
		);
	}
}
?>