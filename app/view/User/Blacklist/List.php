<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * BL�������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlacklistList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user');
		$user_id = $user_session['user_id'];
		
		// �桼���Υ˥å��͡�������
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// BL���������
		$this->listview = array(
			'action_name'	=> 'user_blog_blacklist_list',
			'sql_select'	=> ' b.black_list_id, b.black_list_deny_user_id, u.user_nickname ',
			'sql_from'		=> ' black_list b , user u',
			'sql_where'		=> ' b.black_list_user_id = ? AND b.black_list_status = ? AND b.black_list_deny_user_id = u.user_id AND u.user_status = ?',
			'sql_values'	=> array( $user_id, 1 ,2),
			'sql_num'		=> 5,
		);
	}
}
?>