<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理バナー一覧アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerList extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		
		// バナー一覧の取得
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM banner ORDER BY banner_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		foreach($rows as $k => $v){
			$rows[$k]['banner_url'] = $this->config->get('url') . '?action_user_banner_redirect=true&banner_id=' . $v['banner_id'];
		}
		$this->af->setApp('banner_list',$rows);
		
	}
}
?>