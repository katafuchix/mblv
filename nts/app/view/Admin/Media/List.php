<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ������ǥ����������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminMediaList extends Tv_ListViewClass
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
			'action_name'	=> 'admin_media_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'media',
			'sql_where'	=> ' media_status > 0',
			'sql_order'	=> 'media_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>
