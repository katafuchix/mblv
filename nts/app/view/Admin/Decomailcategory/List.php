<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼�륫�ƥ���������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminDecomailcategoryList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ǥ��᡼�륫�ƥ�������μ���
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT * FROM decomail_category WHERE decomail_category_status <> 0 ORDER BY decomail_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('decomail_category_list',$rows);
	}
}
?>