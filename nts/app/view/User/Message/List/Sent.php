<?php
/**
 * Sent.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * �����Ѥߥ�å������������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserMessageListSent extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ���å�����������
		$user = $this->session->get('user'); 
		$sqlValues[] = $user['user_id'];
		
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'user_message_list_sent',
			'sql_select'	=> 'm.message_id,m.message_title,m.to_user_id,m.message_created_time,m.message_status_to,m.to_user_id,u.user_nickname',
			'sql_from'	=> 'user as u,message as m',
			'sql_where'	=> 'm.message_status = 1 AND m.message_status_from <> 3 AND m.from_user_id = ? AND m.to_user_id = u.user_id',
			'sql_order'	=> 'm.message_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 5,
		);
	}
}
?>