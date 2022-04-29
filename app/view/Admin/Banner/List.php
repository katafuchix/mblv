<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����Хʡ��������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBannerList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �Хʡ������μ���
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_banner_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'banner',
			'sql_where'		=> 'banner_status = 1',
			'sql_order'		=> 'banner_updated_time DESC',
			'sql_values'	=> $values,
		);
	}
}
?>