<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Х�����°������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminAvatarstandList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �ڡ�����
		$this->listview = array(
			'action_name'	=> 'admin_avatarstand_list',
			'sql_select'	=> '*',
			'sql_from'	=> 'avatar_stand',
			'sql_where'	=> 'avatar_stand_status > 0',
			'sql_order'	=> 'avatar_stand_id DESC',
			'sql_values'	=> array(),
		);
	}
}
?>