<?php
/**
 * Avatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���Х����ݡ�������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserAvatarRanking extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ���å���������������ʴ������̤���桼���򥲥��Ȳ�����ȼ�������󤫤�ͭ���Ȥʤ�ޤ���
		$user = $this->session->get('user');
		
		// �桼��������������
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// ���Х������ƥ�����������
		// �����ȥ桼���ξ���ͥ���-1�פޤ�ɽ��������
		$priority = 1;
		if($u->get('user_guest_status') == 1) $priority = -1;
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar_category',
			'sql_where'		=> 'avatar_category_status = 1 AND avatar_category_priority_id >= ?',
			'sql_values'	=> array($priority),
			'sql_order'		=> 'avatar_category_priority_id DESC'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		
		// ���Х�����󥭥�
		$sqlWhere = 'r.type = ? AND a.avatar_id = r.id AND a.avatar_status = 1';
		$sqlValues = array('avatar');
		
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
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar a, ranking r',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3,7'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r);
	}
}
?>