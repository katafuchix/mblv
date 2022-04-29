<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������ۡ�����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserGameHome extends Tv_ListViewClass
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
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_game_home',
			'sql_select'	=> '*',
			'sql_from'	=> 'game as a,user_game as ua,game_category as ac',
			'sql_where'	=> 'ua.user_id = ? AND ua.user_game_status <> 0 AND ua.game_id = a.game_id AND a.game_status = 1 AND a.game_category_id = ac.game_category_id',
			'sql_order'	=> 'ua.user_game_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'	=> 9,
		);
	}
}
?>
