<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ��������������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAdList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// ad_id ����
			'ad_id' => array(
				'column' => 'ad_id',
			),
			// ad_name ����
			'ad_name' => array(
				'type' => 'LIKE',
				'column' => 'ad_name',
			),
			// ad category id
			'ad_category_id' => array(
				'column' => 'ad_category_id',
			),
			// ad desc
			'ad_desc' => array(
				'type' => 'LIKE',
				'column' => 'ad_desc',
			),
			// �ۿ������ơ���������
			'ad_stock_status' => array(
				'column' => 'ad_stock_status',
			),
			// �ۿ�������
			'ad_stock_num' => array(
				'column' => 'ad_stock_num',
			),
			// �ۿ����ϥơ���������
			'ad_start_status' => array(
				'column' => 'ad_start_status',
			),
			// �ۿ�������������
			'ad_start' => array(
				'type' => 'PERIOD',
				'column' => 'ad_start_time',
			),
			// �ۿ���λ�ơ���������
			'ad_end_status' => array(
				'column' => 'ad_end_status',
			),
			// �ۿ���λ��������
			'ad_end' => array(
				'type' => 'PERIOD',
				'column' => 'ad_end_time',
			),
			// �ơ���������
			'ad_status' => array(
				'column' => 'ad_status',
			),
			// ������������
			'ad_created' => array(
				'type' => 'PERIOD',
				'column' => 'ad_created_time',
			),
			// ������������
			'ad_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ad_updated_time',
			),
			// �����������
			'ad_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ad_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> ' * ',
			'sql_from'	=> 'ad',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ad_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$u->getAttrList('ad_category'));
	}
}
?>