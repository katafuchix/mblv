<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcSupplierList extends Tv_ListViewClass
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
			// supplier ID����
			'supplier_id' => array(
				'column' => 'supplier_id',
			),
			// supplier name����
			'supplier_name' => array(
				'type' => 'LIKE',
				'column' => 'supplier_name',
			),
			// ���ơ���������
			'supplier_status' => array(
				'column' => 'supplier_status',
			),
			// ������������
			'supplier_created' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_created_time',
			),
			// ������������
			'supplier_updated' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_updated_time',
			),
			// �����������
			'supplier_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'supplier_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('supplier_status') == "") $this->af->set('supplier_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
				
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' supplier ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'supplier_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
		
	}
}
?>