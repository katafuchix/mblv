<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������Խ��ڡ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminReportList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// ����ԥ桼��ID����
			'report_user_id' => array(
				'column' => 'ru.user_id',
			),
			// �����оݼԥ桼��ID����
			'report_fail_user_id' => array(
				'column' => 'rfu.user_id',
			),
			// ����ԥ桼���˥å��͡��ม��
			'report_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'ru.user_nickname',
			),
			// �����оݼԥ桼���˥å��͡��ม��
			'report_fail_user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'rfu.user_nickname',
			),
			// ����ID����
			'report_id' => array(
				'column' => 'r.report_id',
			),
			// ������ʸ����
			'report_message' => array(
				'type' => 'LIKE',
				'column' => 'r.report_message',
			),
			// ���󥹥ơ���������
			'report_status' => array(
				'column' => 'r.report_status',
			),
			// ����ƻ륹�ơ���������
			'report_checked' => array(
				'column' => 'r.report_checked',
			),
			// �����������
			'report_created' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_created_time',
			),
			// ������������
			'report_updated' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_updated_time',
			),
			// �����������
			'report_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'r.report_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('report_status') == "") $this->af->set('report_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' ru.user_id = r.report_user_id AND rfu.user_id = r.report_fail_user_id ';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 'ru.user_id as report_user_id,ru.user_nickname as report_user_nickname,' .
				'rfu.user_id as report_fail_user_id,rfu.user_nickname as report_fail_user_nickname,' .
				'r.report_id,r.report_message,r.report_status,r.report_checked,r.report_created_time,r.report_updated_time,r.report_deleted_time',
			'sql_from'		=> 'user as ru,user as rfu,report as r',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'r.report_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>