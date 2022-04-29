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
class Tv_View_AdminPointHome extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'user as u,point as p',
			'sql_where'	=> 'u.user_id = p.user_id AND u.user_id = ?',
			'sql_order'	=> 'p.point_created_time DESC',
			'sql_values'	=> array($this->af->get('user_id')),
		);
		
		// ���ߤΥݥ���Ȥ����
		$o =& new Tv_User($this->backend,'user_id',$this->af->get('user_id'));
		$o->exportform();
	}
}
?>