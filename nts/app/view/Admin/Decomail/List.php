<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼��������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminDecomailList extends Tv_ListViewClass 
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
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('dc',$u->getAttrList('decomail_category'));
	}
}
?>