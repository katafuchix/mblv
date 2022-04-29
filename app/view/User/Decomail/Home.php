<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ǥ��᡼��ۡ�����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserDecomailHome extends Tv_ListViewClass
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
			'action_name'	=> 'user_decomail_home',
			'sql_select'	=> '*',
			'sql_from'	=> 'decomail as a,user_decomail as ua,decomail_category as ac',
			'sql_where'	=> 'ua.user_id = ? AND ua.user_decomail_status <> 0 AND ua.decomail_id = a.decomail_id AND a.decomail_status = 1 AND a.decomail_category_id = ac.decomail_category_id',
			'sql_order'	=> 'ua.user_decomail_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'	=> 9,
		);
	}
}
?>