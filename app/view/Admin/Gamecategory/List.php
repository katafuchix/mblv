<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������५�ƥ���������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminGamecategoryList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */

	function preforward()
	{
		// �����५�ƥ�������μ���
		$values = array();
		$this->listview = array(
			'action_name'	=> 'admin_gamecategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'game_category',
			'sql_where'		=> 'game_category_status <> 0',
			'sql_order'		=> 'game_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>