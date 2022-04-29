<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcPostageList extends Tv_ListViewClass
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
			// postage ID����
			'postage_id' => array(
				'column' => 'postage_id',
			),
			// postage name����
			'postage_name' => array(
				'type' => 'LIKE',
				'column' => 'postage_name',
			),
			// ���ơ���������
			'postage_status' => array(
				'column' => 'postage_status',
			),
			// ������������
			'postage_created' => array(
				'type' => 'PERIOD',
				'column' => 'postage_created_time',
			),
			// ������������
			'postage_updated' => array(
				'type' => 'PERIOD',
				'column' => 'postage_updated_time',
			),
			// �����������
			'postage_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'postage_deleted_time',
			),
			'postage_add' => array(
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('postage_status') == "") $this->af->set('postage_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> ' postage ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'postage_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>