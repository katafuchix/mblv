<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminGameList extends Tv_ListViewClass 
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
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('gc',$u->getAttrList('game_category'));
	}
}
?>