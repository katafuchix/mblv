<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ʰ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminEcItemList extends Tv_ListViewClass
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
			// item_id ����
			'item_id' => array(
				'column' => 'item_id',
			),
			// item_name ����
			'item_name' => array(
				'type' => 'LIKE',
				'column' => 'item_name',
			),
			// item category id
			'item_category_id' => array(
				'type'	=> 'REGEXP',
				'column' => 'item_category_id',
			),
			// item detail
			'item_detail' => array(
				'type' => 'LIKE',
				'column' => 'item_detail',
			),
			// �ơ���������
			'item_status' => array(
				'column' => 'item_status',
			),
			// �ۿ����ϥơ���������
			'item_start_status' => array(
				'column' => 'item_start_status',
			),
			// �ۿ���λ�ơ���������
			'item_end_status' => array(
				'column' => 'item_end_status',
			),
			// �ۿ�������������
			'item_start' => array(
				'type' => 'PERIOD',
				'column' => 'item_start_time',
			),
			// �ۿ���λ�ơ���������
			'item_end_status' => array(
				'column' => 'item_end_status',
			),
			// �ۿ���λ��������
			'item_end' => array(
				'type' => 'PERIOD',
				'column' => 'item_end_time',
			),
			// �ơ���������
			'item_status' => array(
				'column' => 'item_status',
			),
			// ������������
			'item_created' => array(
				'type' => 'PERIOD',
				'column' => 'item_created_time',
			),
			// ������������
			'item_updated' => array(
				'type' => 'PERIOD',
				'column' => 'item_updated_time',
			),
			// �����������
			'item_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'item_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('item_status') == "") $this->af->set('item_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_ec_item_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'item',
			'sql_where'	=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'item_updated_time DESC',
		);
		
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// ���ƥ������
		$u = & $this->backend->getManager('Util'); 
		$ic = $u->getAttrList('item_category');
		
		// ���ƥ���̾�򥻥åȤ���
		foreach($listview_data as $k=>$v){
			$category = explode(',',$v['item_category_id']);
			foreach($category as $k2=>$v2){
				if($ic[$v2]['name']){
					$listview_data[$k]['item_category_name'] .= "[".$ic[$v2]['name']."] ";
				}
			}
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
//		if($this->af->get('item_category_id')) $this->af->setApp('item_category_name', $ic[$this->af->get('item_category_id')]['name']);
	}
}
?>