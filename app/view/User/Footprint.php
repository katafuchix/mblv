<?php
/**
 * Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * �������Ȳ��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFootprint extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �桼���������
		$user = $this->session->get('user');
		
		// �ꥹ�ȥӥ塼����
		$sqlWhere = 'to_user_id=? AND from_user_id=user_id';
		$sqlValues = array($user['user_id']);
		$this->listview = array(
			'action_name'	=> 'user_footprint',
			'sql_select'	=> 'from_user_id, footprint_created_time, user_id, user_nickname',
			'sql_from'		=> 'footprint, user',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'footprint_created_time DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>