<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������𥫥ƥ���ݡ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAdcategoryList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���𥫥ƥ�������μ���
		$values = array();
		
		$this->listview = array(
			'action_name'	=> 'admin_adcategory_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'ad_category',
			'sql_where'		=> 'ad_category_status <> 0',
			'sql_order'		=> 'ad_category_priority_id DESC',
			'sql_values'	=> $values,
		);
	}
}
?>