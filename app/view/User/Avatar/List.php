<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����ꥹ�Ȳ��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarList extends Tv_ListViewClass
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
			// avatar category id
			'avatar_category_id' => array(
				'column' => 'a.avatar_category_id',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere == "") $sqlWhere = "1 ";
		
		// ������ɸ���
		if($this->af->get('keyword') != ""){
			$sqlWhere .= " AND (a.avatar_name LIKE ? OR a.avatar_desc LIKE ?) ";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
			$sqlValues[] = "%%" . $this->af->get('keyword') . "%%";
		}
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// �桼��������������
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		// ���̾�����ɲä���
		// �������פʤ�Сֽ����ѡװʳ���ɽ��
		if($u->get('user_sex')==1){
			$exclude_sex = 2;
		}
		// �ֽ����פʤ�С������ѡװʳ���ɽ��
		elseif($u->get('user_sex')==2){
			$exclude_sex = 1;
		}
		$sqlWhere .= " AND a.avatar_sex_type <> ?";
		$sqlValues[] = $exclude_sex;
		
		// �����ȥ桼���ξ���ͥ���-1�פޤ�ɽ��������
		$priority = 1;
		if($u->get('user_guest_status') == 1) $priority = -1;
		$sqlWhere .= " AND ac.avatar_category_status = 1 AND ac.avatar_category_priority_id >= ?";
		$sqlValues[] = $priority;
		
		// ���ơ�������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND a.avatar_status = 1 AND ac.avatar_category_id = a.avatar_category_id';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_start_status = 0 OR (a.avatar_start_status = 1 AND a.avatar_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_end_status = 0 OR (a.avatar_end_status = 1 AND a.avatar_end_time > now())) ";
		// �ۿ���λ����ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_stock_status = 0 OR (a.avatar_stock_status = 1 AND a.avatar_stock_num > 0)) ";
		
		// OEDER��
		$sort_key = 'avatar_updated_time';
		$sort_order =  'DESC';
		if($this->af->get('sort_key') && $this->af->get('sort_order')){
			$sort_key = $this->af->get('sort_key');
			$sort_order = $this->af->get('sort_order');
		}
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_avatar_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a, avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> "a.{$sort_key} {$sort_order}",
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 6,
		);
		// ���ƥ������μ���
		$um = & $this->backend->getManager('Util');
		$this->af->setApp('ac',$um->getAttrList('avatar_category'));
	}
}
?>