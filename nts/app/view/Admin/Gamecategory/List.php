<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������५�ƥ���������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminGamecategoryList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */

	function preforward()
	{
		// �����५�ƥ�������μ���
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM game_category WHERE game_category_status <> 0 ORDER BY game_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('game_category_list',$rows);
	}
}
?>