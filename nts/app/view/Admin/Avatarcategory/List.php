<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバターカテゴリ一覧画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAvatarcategoryList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// アバターカテゴリ一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM avatar_category WHERE avatar_category_status <> 0 ORDER BY avatar_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('avatar_category_list',$rows);
	}
}
?>