<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ݥ���Ȱ������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminPointList extends Tv_ListViewClass
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
			// �桼��ID����
			'user_id' => array(
				'column' => 'u.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// �ݥ���ȥ�����
			'point_type' => array(
				'column' => 'p.point_type',
			),
			// �ݥ����ID
			'point_id' => array(
				'column' => 'p.point_id',
			),
			// �ݥ���ȥ���ID
			'point_sub_id' => array(
				'column' => 'p.point_sub_id',
			),
			// �桼������ID
			'user_sub_id' => array(
				'column' => 'p.user_sub_id',
			),
			// �ݥ��������
			'point_memo' => array(
				'type'	=> 'LIKE',
				'column' => 'p.point_memo',
			),
			// �ݥ���ȥ��ơ�����
			'point_status' => array(
				'column' => 'p.point_status',
			),
			// ������������
			'point_created' => array(
				'type' => 'PERIOD',
				'column' => 'p.point_created_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = p.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'user as u,point as p',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'p.point_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>