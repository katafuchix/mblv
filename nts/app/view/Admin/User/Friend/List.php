<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����桼��ͧã�����ڡ����ӥ塼���饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_View_AdminUserFriendList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public 
	 */
	function preforward()
	{
		// �桼������
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		$this->af->setApp('user', $user->getNameObject());
		
		// ������������
		$sqlWhere = 'f.to_user_id = u.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_user_list',
			'sql_select'	=> 'u.user_id,u.user_mailaddress,u.user_nickname,u.user_status,u.user_magazine_error_num,u.user_created_time,u.user_updated_time,u.user_deleted_time,f.friend_status',
			'sql_from'	=>
				'(SELECT to_user_id, friend_status FROM friend WHERE from_user_id=' .
				$this->af->get('user_id') .
				') AS f, user AS u',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'u.user_created_time DESC',
			'sql_values'	=> array(),
		);
	}
}
?>
