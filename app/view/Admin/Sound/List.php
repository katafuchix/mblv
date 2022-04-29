<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������ɰ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminsoundList extends Tv_ListViewClass
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
			// sound_id ����
			'sound_id' => array(
				'column' => 'sound_id',
			),
			// sound_name ����
			'sound_name' => array(
				'type' => 'LIKE',
				'column' => 'sound_name',
			),
			// sound category id
			'sound_category_id' => array(
				'column' => 'sound_category_id',
			),
			// sound desc
			'sound_desc' => array(
				'type' => 'LIKE',
				'column' => 'sound_desc',
			),
			// �ۿ������ơ���������
			'sound_stock_status' => array(
				'column' => 'sound_stock_status',
			),
			// �ۿ�������
			'sound_stock_num' => array(
				'column' => 'sound_stock_num',
			),
			// �ۿ����ϥơ���������
			'sound_start_status' => array(
				'column' => 'sound_start_status',
			),
			// �ۿ�������������
			'sound_start' => array(
				'type' => 'PERIOD',
				'column' => 'sound_start_time',
			),
			// �ۿ���λ�ơ���������
			'sound_end_status' => array(
				'column' => 'sound_end_status',
			),
			// �ۿ���λ��������
			'sound_end' => array(
				'type' => 'PERIOD',
				'column' => 'sound_end_time',
			),
			// �ơ���������
			'sound_status' => array(
				'column' => 'sound_status',
			),
			// ������������
			'sound_created' => array(
				'type' => 'PERIOD',
				'column' => 'sound_created_time',
			),
			// ������������
			'sound_updated' => array(
				'type' => 'PERIOD',
				'column' => 'sound_updated_time',
			),
			// �����������
			'sound_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'sound_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('sound_status') == "") $this->af->set('sound_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_sound_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'sound',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'sound_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$sc = $u->getAttrList('sound_category');
		
		// ���ƥ���̾�򥻥åȤ���
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['sound_category_name'] = $sc[$v['sound_category_id']]['name'];
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('sound_category_id')) $this->af->setApp('sound_category_name', $sc[$this->af->get('sound_category_id')]['name']);

	}
}
?>