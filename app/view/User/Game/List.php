<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameList extends Tv_ListViewClass
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
			// game category id
			'game_category_id' => array(
				'column' => 'a.game_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// ������ɸ���
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.game_name LIKE ? OR a.game_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ���ơ�������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND a.game_status = 1 AND ac.game_category_id = a.game_category_id';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.game_start_status = 0 OR (a.game_start_status = 1 AND a.game_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.game_end_status = 0 OR (a.game_end_status = 1 AND a.game_end_time > now())) ";
		// �ۿ���λ����ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.game_stock_status = 0 OR (a.game_stock_status = 1 AND a.game_stock_num > 0)) ";
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_game_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'game as a, game_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.game_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 9,
		);
		// ���ƥ������μ���
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('game_category'));
	}
}
?>