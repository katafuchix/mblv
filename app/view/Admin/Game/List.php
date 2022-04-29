<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminGameList extends Tv_ListViewClass 
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
			// game_id ����
			'game_id' => array(
				'column' => 'game_id',
			),
			// game_name ����
			'game_name' => array(
				'type' => 'LIKE',
				'column' => 'game_name',
			),
			// game category id
			'game_category_id' => array(
				'column' => 'game_category_id',
			),
			// game desc
			'game_desc' => array(
				'type' => 'LIKE',
				'column' => 'game_desc',
			),
			// �ۿ������ơ���������
			'game_stock_status' => array(
				'column' => 'game_stock_status',
			),
			// �ۿ�������
			'game_stock_num' => array(
				'column' => 'game_stock_num',
			),
			// �ۿ����ϥơ���������
			'game_start_status' => array(
				'column' => 'game_start_status',
			),
			// �ۿ�������������
			'game_start' => array(
				'type' => 'PERIOD',
				'column' => 'game_start_time',
			),
			// �ۿ���λ�ơ���������
			'game_end_status' => array(
				'column' => 'game_end_status',
			),
			// �ۿ���λ��������
			'game_end' => array(
				'type' => 'PERIOD',
				'column' => 'game_end_time',
			),
			// �ơ���������
			'game_status' => array(
				'column' => 'game_status',
			),
			// ������������
			'game_created' => array(
				'type' => 'PERIOD',
				'column' => 'game_created_time',
			),
			// ������������
			'game_updated' => array(
				'type' => 'PERIOD',
				'column' => 'game_updated_time',
			),
			// �����������
			'game_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'game_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('game_status') == "") $this->af->set('game_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_game_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'game',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'game_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$gc = $u->getAttrList('game_category');
		
		// �����५�ƥ���̾�򥻥åȤ���
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['game_category_name'] = $gc[$v['game_category_id']]['name'];
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('game_category_id')) $this->af->setApp('game_category_name', $gc[$this->af->get('game_category_id')]['name']);
	}
}
?>