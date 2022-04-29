<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������ɥۡ�����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSoundHome extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_sound_home',
			'sql_select'	=> '*',
			'sql_from'		=> 'sound as a,user_sound as ua,sound_category as ac',
			'sql_where'		=> 'ua.user_id = ? AND ua.user_sound_status <> 0 AND ua.sound_id = a.sound_id AND a.sound_status = 1 AND a.sound_category_id = ac.sound_category_id',
			'sql_order'		=> 'ua.user_sound_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'		=> 9,
		);
	}
}
?>