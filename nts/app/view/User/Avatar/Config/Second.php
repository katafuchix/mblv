<?php
/**
 * Second.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ڡ���2���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarConfigSecond extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ������
		$sqlWhere = "ac.avatar_system_category_id = 3 AND ac.avatar_category_id = a.avatar_category_id AND a.first_avatar = 1";
		
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
		
		// ���ơ�������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= ' AND a.avatar_status = 1 AND ac.avatar_category_id = a.avatar_category_id';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_start_status = 0 OR (a.avatar_start_status = 1 AND a.avatar_start_time > now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_end_status = 0 OR (a.avatar_end_status = 1 AND a.avatar_end_time > now())) ";
		// �ۿ���λ����ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (a.avatar_stock_status = 0 OR (a.avatar_stock_status = 1 AND a.avatar_stock_num < 0)) ";
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_avatar_config_second',
			'sql_select'	=> '*',
			'sql_from'	=> 'avatar as a, avatar_category as ac',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'a.avatar_updated_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 6,
		);
	}
}
?>
