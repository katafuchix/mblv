<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������������ꥹ�Ȳ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAccessList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$db = $this->backend->getDB();
		$values = array();
		$sql = "SELECT DISTINCT access_key FROM access WHERE access_key LIKE '%Tv_Action_User%' ORDER BY access_key ASC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);


		foreach($rows as $k => $v){
			$rows[$k]['access_key'] = $v['access_key'];
			$rows[$k]['short_access_key'] = str_replace('Tv_Action_User','',$v['access_key']);
		}

		$this->af->setApp('access_list',$rows);
		
	}
}
?>