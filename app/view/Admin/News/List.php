<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����˥塼���������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminNewsList extends Tv_ListViewClass
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
			// news_id ����
			'news_id' => array(
				'column' => 'news_id',
			),
			// news_title ����
			'news_title' => array(
				'type' => 'LIKE',
				'column' => 'news_title',
			),
			// news_body ����
			'news_body' => array(
				'type' => 'LIKE',
				'column' => 'news_body',
			),
			// news_type ����
			'news_type' => array(
				'type' => 'REGEXP_IN',
				'column' => 'news_type',
			),
			// news_time����
			'news_time' => array(
				'column' => 'news_time',
			),
			// ���ơ���������
			'news_status' => array(
				'column' => 'news_status',
			),
			// �ۿ����ϥơ���������
			'news_start_status' => array(
				'column' => 'news_start_status',
			),
			// �ۿ���λ�ơ���������
			'news_end_status' => array(
				'column' => 'news_end_status',
			),
			// �ۿ�������������
			'news_start' => array(
				'type' => 'PERIOD',
				'column' => 'news_start_time',
			),
			// �ۿ���λ�ơ���������
			'news_end_status' => array(
				'column' => 'news_end_status',
			),
			// �ۿ���λ��������
			'news_end' => array(
				'type' => 'PERIOD',
				'column' => 'news_end_time',
			),
			// ������������
			'news_created' => array(
				'type' => 'PERIOD',
				'column' => 'news_created_time',
			),
			// ������������
			'news_updated' => array(
				'type' => 'PERIOD',
				'column' => 'news_updated_time',
			),
			// �����������
			'news_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'news_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('news_status') == "") $this->af->set('news_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �˥塼�������μ���
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'news_updated_time DESC',
		);
		// ListView��¹Ԥ���
		$this->build();
		$listview_data = $this->af->getApp('listview_data');
		
		// �����̾�򥻥åȤ���
		$news_types = $this->config->get('news_type');
		foreach($listview_data as $k=>$v){
			// ������ʬ�򤹤�
			$data = explode(',',$v['news_type']);
			// ���٤Ƥ��������Ф��ƽ�����Ԥ�
			foreach($data as $v2){
				// �����������̾��¸�ߤ�����
				if($news_types[$v2]['name']){
					// ����ɽ������ǡ������ɲä���
					$listview_data[$k]['news_type_name'] .= "[".$news_types[$v2]['name']."] ";
				}
			}
		}
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
	}
}
?>