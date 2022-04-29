<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ǥ��᡼��������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserDecomailList extends Tv_ListViewClass
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
			// decomail category id
			'decomail_category_id' => array(
				'column' => 'a.decomail_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// ������ɸ���
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.decomail_name LIKE ? OR a.decomail_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ���ơ�������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND a.decomail_status = 1 AND ac.decomail_category_id = a.decomail_category_id';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.decomail_start_status = 0 OR (a.decomail_start_status = 1 AND a.decomail_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.decomail_end_status = 0 OR (a.decomail_end_status = 1 AND a.decomail_end_time > now())) ";
		// �ۿ���λ����ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.decomail_stock_status = 0 OR (a.decomail_stock_status = 1 AND a.decomail_stock_num > 0)) ";
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_decomail_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'decomail as a, decomail_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.decomail_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 9,
		);
		// ���ƥ������μ���
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('decomail_category'));
	}
}
?>