<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������ɥ��ƥ���������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminSoundcategoryList extends Tv_ViewClass
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
		$sql = "SELECT * FROM sound_category WHERE sound_category_status <> 0 ORDER BY sound_category_priority_id DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('sound_category_list',$rows);
	}
}
?>