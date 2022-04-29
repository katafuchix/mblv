<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ۡ�����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAvatarHome extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		
		// �������
		$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
		$sqlValues = array($user['user_id']);
		
		// �����楢�Х�������
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere . ' AND ua.user_avatar_wear = 1',
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('user_avatar_wear_list', $r); 
		
		// �����������
		if($this->af->get('keyword')){
			$sqlWhere .= ' AND (a.avatar_name LIKE ? OR a.avatar_desc LIKE ?)';
			$sqlValues[] = '%%' . $this->af->get('keyword') . '%%';
			$sqlValues[] = '%%' . $this->af->get('keyword') . '%%';
		}
		
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_avatar_home',
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'ua.user_avatar_updated_time DESC',
			'sql_num'		=> 6,
		);
	}
}
?>
