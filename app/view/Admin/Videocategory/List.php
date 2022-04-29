<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオカテゴリ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminVideocategoryList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */

	function preforward()
	{
		// ビデオカテゴリ一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM video_category WHERE video_category_status <> 0 ORDER BY video_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('video_category_list',$rows);
	}
}
?>