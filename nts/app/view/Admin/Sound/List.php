<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������ɰ������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminsoundList extends Tv_ListViewClass
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
			// sound_id ����
			'sound_id' => array(
				'column' => 'sound_id',
			),
			// sound_name ����
			'sound_name' => array(
				'type' => 'LIKE',
				'column' => 'sound_name',
			),
			// sound category id
			'sound_category_id' => array(
				'column' => 'sound_category_id',
			),
			// sound desc
			'sound_desc' => array(
				'type' => 'LIKE',
				'column' => 'sound_desc',
			),
			// �ۿ������ơ���������
			'sound_stock_status' => array(
				'column' => 'sound_stock_status',
			),
			// �ۿ�������
			'sound_stock_num' => array(
				'column' => 'sound_stock_num',
			),
			// �ۿ����ϥơ���������
			'sound_start_status' => array(
				'column' => 'sound_start_status',
			),
			// �ۿ�������������
			'sound_start' => array(
				'type' => 'PERIOD',
				'column' => 'sound_start_time',
			),
			// �ۿ���λ�ơ���������
			'sound_end_status' => array(
				'column' => 'sound_end_status',
			),
			// �ۿ���λ��������
			'sound_end' => array(
				'type' => 'PERIOD',
				'column' => 'sound_end_time',
			),
			// �ơ���������
			'sound_status' => array(
				'column' => 'sound_status',
			),
			// ������������
			'sound_created' => array(
				'type' => 'PERIOD',
				'column' => 'sound_created_time',
			),
			// ������������
			'sound_updated' => array(
				'type' => 'PERIOD',
				'column' => 'sound_updated_time',
			),
			// �����������
			'sound_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'sound_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_sound_list',
			'sql_select'	=> ' * ',
			'sql_from'	=> 'sound',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'sound_id ASC ',
			'sql_values'	=> $sqlValues,
		);
		// ���ƥ������
		$u = & $this->backend->getManager('Util');
		$this->af->setApp('sc',$u->getAttrList('sound_category'));
	}
}
?>