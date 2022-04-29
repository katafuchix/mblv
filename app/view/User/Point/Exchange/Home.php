<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * �ݥ���ȸ򴹥ۡ�����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointExchangeHome extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access	public
	 */
	function preforward()
	{ 
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		
		//�ʲ�DB���䤤��碌
		$db = $this->backend->getDB();
		
		// ����ɽ������ڡ����Ǥϲ����ܤ���ɽ������Τ�
		$this->offset = $this->af->get('start') == null ? 0 : $this->af->get('start');
		
		// ���ڡ������ɽ��������
		$this->count = 10;
		
		// SQL���
		$sqlFrom = "point as p, point_exchange as pe";
		$sqlCount = "p.point";
		$sqlOrder = "pe.point_exchange_time DESC";
		$sqlSelect = "p.point_id,p.point, p.point_type, p.point_status, pe.price, pe.fee, pe.point_exchange_time";
		$sqlWhere = "p.user_id = ? AND (p.point_type = 10 OR p.point_type = 11 OR p.point_type = 12) AND p.point_id = pe.point_id";
		$sqlValues = array($user['user_id']);
		
		// ������䤤��碌��������������
		$sql = "SELECT count(" . $sqlCount . ") FROM " . $sqlFrom . " WHERE " . $sqlWhere . " ORDER BY " . $sqlOrder;
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		$this->total = $rows[0]['count(' . $sqlCount . ')'];
		$this->af->setApp('total', $this->total);
		
		// �ºݤ˺���Υڡ�����ɽ������ǡ������������
		$sql = "SELECT " . $sqlSelect . " FROM " . $sqlFrom . " WHERE " . $sqlWhere . " ORDER BY " . $sqlOrder . " LIMIT " . $this->offset . "," . $this->count;
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		
		// �ݥ���ȥꥹ�Ȥ򥻥å�
		$this->af->setApp('point_list', $rows);
		
		// �ڡ����󥰥��ִؿ��ƤӽФ�
		$um = &$this->backend->getManager('Util');
		$pager = $um->getPager($this->total, $this->offset, $this->count, 'action_user_point_exchange_home');
		$this->af->setApp('pager', $pager);
		
		// ���ߤΥݥ���Ȥ����
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$user_point = $o->get('user_point');
		$this->af->setApp('user_point', $user_point);
	}
}

?>
