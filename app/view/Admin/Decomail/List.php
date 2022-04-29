<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ǥ��᡼��������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminDecomailList extends Tv_ListViewClass 
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
			// decomail_id ����
			'decomail_id' => array(
				'column' => 'decomail_id',
			),
			// decomail_name ����
			'decomail_name' => array(
				'type' => 'LIKE',
				'column' => 'decomail_name',
			),
			// decomail category id
			'decomail_category_id' => array(
				'column' => 'decomail_category_id',
			),
			// decomail desc
			'decomail_desc' => array(
				'type' => 'LIKE',
				'column' => 'decomail_desc',
			),
			// �ۿ������ơ���������
			'decomail_stock_status' => array(
				'column' => 'decomail_stock_status',
			),
			// �ۿ�������
			'decomail_stock_num' => array(
				'column' => 'decomail_stock_num',
			),
			// �ۿ����ϥơ���������
			'decomail_start_status' => array(
				'column' => 'decomail_start_status',
			),
			// �ۿ�������������
			'decomail_start' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_start_time',
			),
			// �ۿ���λ�ơ���������
			'decomail_end_status' => array(
				'column' => 'decomail_end_status',
			),
			// �ۿ���λ��������
			'decomail_end' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_end_time',
			),
			// �ơ���������
			'decomail_status' => array(
				'column' => 'decomail_status',
			),
			// ������������
			'decomail_created' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_created_time',
			),
			// ������������
			'decomail_updated' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_updated_time',
			),
			// �����������
			'decomail_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'decomail_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('decomail_status') == "") $this->af->set('decomail_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_decomail_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'decomail',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'decomail_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$dc = $u->getAttrList('decomail_category');
		
		// �ǥ��᡼�륫�ƥ���̾�򥻥åȤ���
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['decomail_category_name'] = $dc[$v['decomail_category_id']]['name'];
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('decomail_category_id')) $this->af->setApp('decomail_category_name', $dc[$this->af->get('decomail_category_id')]['name']);
	}
}
?>