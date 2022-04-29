<?php
/**
 * Home.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * �ݥ���Ȳ��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserPointHome extends Tv_ListViewClass
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
		
		// ���ߤΥݥ���Ȥ����
		$o =& new Tv_User($this->backend,'user_id',$user['user_id']);
		$this->af->setApp('user', $o->getNameObject());
		
		// �桼���ݥ���Ⱦ�������
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_point_home',
			'sql_select'	=> '*',
			'sql_from'	=> 'point',
			'sql_where'	=> 'user_id = ? AND point <> 0 AND point_status <> 0',
			'sql_order'	=> 'point_created_time DESC',
			'sql_values'	=> array($user['user_id']),
			'sql_num'	=> 10,
		);
	}
}
?>