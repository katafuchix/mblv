<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����ե꡼�ڡ����������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminContentsList extends Tv_ListViewClass
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
			// ID����
			'contents_id' => array(
				'column' => 'contents_id',
			),
			// code����
			'contents_code' => array(
				'type' => 'LIKE',
				'column' => 'contents_code',
			),
			// �����ȥ븡��
			'contents_title' => array(
				'type' => 'LIKE',
				'column' => 'contents_title',
			),
			// ��ʸ����
			'contents_body' => array(
				'type' => 'LIKE',
				'column' => 'contents_body',
			),
			// ���ơ���������
			'contents_status' => array(
				'column' => 'contents_status',
			),
			// �����������
			'contents_created' => array(
				'type' => 'PERIOD',
				'column' => 'contents_created_time',
			),
			// ������������
			'contents_updated' => array(
				'type' => 'PERIOD',
				'column' => 'contents_updated_time',
			),
			// �����������
			'contents_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'contents_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('contents_status') == "") $this->af->set('contents_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// ��������δ����Ԥ����¤���ĥ���å׾���Τ߼�������(�ø������Ԥ����ǡ�������)
		$um = $this->backend->getManager('Util');
		$admin = $this->session->get('admin');
		$a =& new Tv_Admin($this->backend, 'admin_id', $admin['admin_id']);
		$admin_shop_id = $a->get('admin_shop_id');
		if ($a->get('admin_status') == 1) $sqlWhere .= ' AND shop_id in(' . $admin_shop_id . ')';
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_contents_list',
			'sql_select'	=> 	' * ',
			'sql_from'		=> 'contents',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'contents_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>