<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理広告カテゴリポータル画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAdcategoryList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 広告カテゴリ一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM ad_category WHERE ad_category_status <> 0 ORDER BY ad_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('ad_category_list',$rows);
	}
}
?>
