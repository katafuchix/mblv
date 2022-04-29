<?php
/**
 * File.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե�����������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminFile extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_file',
			'sql_select'	=> '*',
			'sql_from'		=> 'file',
			'sql_where'		=> 'file_status = 1',
			'sql_order'		=> 'file_id DESC',
			'sql_values'	=> array(),
			'sql_num'		=> 5,
		);
	}
}
?>