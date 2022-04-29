<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����������Ȱ������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminSegmentList extends Tv_ListViewClass
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
			'action_name'	=> 'admin_segment_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'segment',
			'sql_where'	=> 'segment_status > 0',
			'sql_order'	=> 'segment_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>
