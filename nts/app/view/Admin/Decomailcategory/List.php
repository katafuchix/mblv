<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメールカテゴリ一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminDecomailcategoryList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// デコメールカテゴリ一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM decomail_category WHERE decomail_category_status <> 0 ORDER BY decomail_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('decomail_category_list',$rows);
	}
}
?>