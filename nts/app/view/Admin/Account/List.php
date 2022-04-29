<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����ԥ�������Ȱ����ڡ����ӥ塼���饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_View_AdminAccountList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public 
	 */
	function preforward()
	{
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_account_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'admin',
			'sql_where'	=> 'admin_status > 0',
			'sql_order'	=> 'admin_id DESC',
			'sql_values'	=> array(),
		);
		
	}
}
?>
