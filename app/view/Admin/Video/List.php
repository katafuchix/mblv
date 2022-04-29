<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ӥǥ��������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminVideoList extends Tv_ListViewClass
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
			// video_id ����
			'video_id' => array(
				'column' => 'video_id',
			),
			// video_name ����
			'video_name' => array(
				'type' => 'LIKE',
				'column' => 'video_name',
			),
			// video category id
			'video_category_id' => array(
				'column' => 'video_category_id',
			),
			// video desc
			'video_desc' => array(
				'type' => 'LIKE',
				'column' => 'video_desc',
			),
			// �ۿ������ơ���������
			'video_stock_status' => array(
				'column' => 'video_stock_status',
			),
			// �ۿ�������
			'video_stock_num' => array(
				'column' => 'video_stock_num',
			),
			// �ۿ����ϥơ���������
			'video_start_status' => array(
				'column' => 'video_start_status',
			),
			// �ۿ�������������
			'video_start' => array(
				'type' => 'PERIOD',
				'column' => 'video_start_time',
			),
			// �ۿ���λ�ơ���������
			'video_end_status' => array(
				'column' => 'video_end_status',
			),
			// �ۿ���λ��������
			'video_end' => array(
				'type' => 'PERIOD',
				'column' => 'video_end_time',
			),
			// �ơ���������
			'video_status' => array(
				'column' => 'video_status',
			),
			// ������������
			'video_created' => array(
				'type' => 'PERIOD',
				'column' => 'video_created_time',
			),
			// ������������
			'video_updated' => array(
				'type' => 'PERIOD',
				'column' => 'video_updated_time',
			),
			// �����������
			'video_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'video_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('video_status') == "") $this->af->set('video_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_video_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'video',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'video_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$sc = $u->getAttrList('video_category');
		
		// ���ƥ���̾�򥻥åȤ���
		foreach($listview_data as $k=>$v){
			$listview_data[$k]['video_category_name'] = $sc[$v['video_category_id']]['name'];
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		if($this->af->get('video_category_id')) $this->af->setApp('video_category_name', $sc[$this->af->get('video_category_id')]['name']);

	}
}
?>