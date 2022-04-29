<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcExchangeList extends Tv_ListViewClass
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
			// exchange ID����
			'exchange_id' => array(
				'column' => 'exchange_id',
			),
			// exchange name����
			'exchange_name' => array(
				'type' => 'LIKE',
				'column' => 'exchange_name',
			),
			// ���ơ���������
			'exchange_status' => array(
				'column' => 'exchange_status',
			),
			// ������������
			'exchange_created' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_created_time',
			),
			// ������������
			'exchange_updated' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_updated_time',
			),
			// �����������
			'exchange_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'exchange_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('exchange_status') == "") $this->af->set('exchange_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' exchange ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'exchange_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
		
	}
}
?>