<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンドカテゴリ一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminSoundcategoryList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */

	function preforward()
	{
		// ゲームカテゴリ一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM sound_category WHERE sound_category_status <> 0 ORDER BY sound_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('sound_category_list',$rows);
	}
}
?>