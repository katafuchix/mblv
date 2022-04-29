<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����åװ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcShopList extends Tv_ListViewClass
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
			// shop ID����
			'shop_id' => array(
				'column' => 'shop_id',
			),
			// shop name����
			'shop_name' => array(
				'type' => 'LIKE',
				'column' => 'shop_name',
			),
			// ���ơ���������
			'shop_status' => array(
				'column' => 'shop_status',
			),
			// ������������
			'shop_created' => array(
				'type' => 'PERIOD',
				'column' => 'shop_created_time',
			),
			// ������������
			'shop_updated' => array(
				'type' => 'PERIOD',
				'column' => 'shop_updated_time',
			),
			// �����������
			'shop_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'shop_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('shop_status') == "") $this->af->set('shop_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' shop ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'shop_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>