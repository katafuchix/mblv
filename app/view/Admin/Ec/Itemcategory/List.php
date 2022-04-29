<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʥ��ƥ���������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcItemcategoryList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// item_category ID����
			'item_category_id' => array(
				'column' => 'item_category_id',
			),
			'shop_id' => array(
				'column' => 'shop_id',
			),
			// ̾�θ���
			'item_category_name' => array(
				'type' => 'LIKE',
				'column' => 'item_category_name',
			),
			// ���ơ���������
			'item_category_status' => array(
				'column' => 'item_category_status',
			),
			// ������������
			'item_category_created' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_created_time',
			),
			// ������������
			'item_category_updated' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_updated_time',
			),
			// �����������
			'item_category_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'item_category_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('item_category_status') == "") $this->af->set('item_category_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' item_category ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'item_category_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>