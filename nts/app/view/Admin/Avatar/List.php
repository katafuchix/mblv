<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������Х����������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAvatarList extends Tv_ListViewClass
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
			// avatar_id ����
			'avatar_id' => array(
				'column' => 'a.avatar_id',
			),
			// avatar_name ����
			'avatar_name' => array(
				'type' => 'LIKE',
				'column' => 'a.avatar_name',
			),
			// avatar category id
			'avatar_category_id' => array(
				'column' => 'a.avatar_category_id',
			),
			// avatar desc
			'avatar_desc' => array(
				'type' => 'LIKE',
				'column' => 'a.avatar_desc',
			),
			// �ۿ������ơ���������
			'avatar_stock_status' => array(
				'column' => 'a.avatar_stock_status',
			),
			// �ۿ�������
			'avatar_stock_num' => array(
				'column' => 'a.avatar_stock_num',
			),
			// �ۿ����ϥơ���������
			'avatar_start_status' => array(
				'column' => 'a.avatar_start_status',
			),
			// �ۿ�������������
			'avatar_start' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_start_time',
			),
			// �ۿ���λ�ơ���������
			'avatar_end_status' => array(
				'column' => 'a.avatar_end_status',
			),
			// �ۿ���λ��������
			'avatar_end' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_end_time',
			),
			// �ơ���������
			'avatar_status' => array(
				'column' => 'a.avatar_status',
			),
			// ������������
			'avatar_created' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_created_time',
			),
			// ������������
			'avatar_updated' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_updated_time',
			),
			// �����������
			'avatar_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'a.avatar_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �������
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= 'a.avatar_category_id = ac.avatar_category_id';
		
		// ���ơ������ν����
		if($this->af->get('avatar_status') == ''){
			$sqlWhere .= ' AND a.avatar_status = 1';
		}
		
		// ���Х���Z��ɸ�θ���
		if($this->af->get('avatar_z')){
			$sqlWhere .= ' AND (a.avatar_image1_z = ? OR a.avatar_image2_z = ?)';
			$sqlValues[] = $this->af->get('avatar_z');
			$sqlValues[] = $this->af->get('avatar_z');
		}
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_avatar_list',
			'sql_select'	=> ' * ',
			'sql_from'		=> 'avatar as a,avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'a.avatar_updated_time DESC ',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>