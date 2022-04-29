<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե꡼�ڡ����������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminContentsList extends Tv_ListViewClass
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
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_contents_list',
			'sql_select'	=> 	' * ',
			'sql_from'		=> 'contents',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'contents_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>
