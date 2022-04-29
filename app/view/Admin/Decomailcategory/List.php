<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ǥ��᡼�륫�ƥ���������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminDecomailcategoryList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �ǥ��᡼�륫�ƥ�������μ���
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_decomailcategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_status <> 0',
			'sql_order'		=> 'decomail_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>