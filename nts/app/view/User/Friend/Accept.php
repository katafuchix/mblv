<?php
/**
 * Accept.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ͧãǧ���Ԥ��桼���������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendAccept extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		//���å���󤫤�桼���������
		$user = $this->session->get('user');
		
		// ��ǧ�Ԥ����������
		$this->listview = array(
			'data_only'		=> 'true',
			'action_name'		=> 'user_friend_accept',
			'sql_select'		=> 'u.user_id as from_user_id,u.user_nickname as from_user_nickname,f.friend_id,f.friend_message',
			'sql_from'		=> 'user as u,friend as f',
			'sql_where'		=> 'f.to_user_id = ? AND u.user_id = f.from_user_id AND f.friend_status = 1 AND u.user_status = 2',
			'sql_order'		=> 'f.friend_id DESC',
			'sql_values'		=> array($user['user_id']),
		);
	}
}
?>