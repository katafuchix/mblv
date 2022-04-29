<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ȥ����å�������������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminThemaList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */

	function preforward()
	{
		// �ȥ����å�����������μ���
		$this->listview = array(
			'action_name'	=> 'admin_twitter_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'thema',
			'sql_where'		=> 'thema_status <> 0',
			'sql_order'		=> 'thema_created_time DESC',
			'sql_num'	=> 20,
		);
	}
}
?>
