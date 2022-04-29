<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����桼�����å��ߥ�˥ƥ������ӥ塼���饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_View_AdminUserCommunityList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public 
	 */
	function preforward()
	{
		// �桼������
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		$this->af->setApp('user', $user->getNameObject());
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'c.community_id,c.community_title,c.community_description,c.community_member_num,c.community_status,c.community_checked,c.community_created_time,c.community_updated_time,c.community_deleted_time,cca.community_category_name,cm.community_member_status',
			'sql_from'	=> '(SELECT community_id, community_member_status FROM community_member WHERE user_id=' .
				$this->af->get('user_id') .
				') as cm, community as c, community_category as cca',
			'sql_where'	=> 'cm.community_id = c.community_id AND c.community_category_id = cca.community_category_id',
			'sql_order'	=> 'c.community_updated_time DESC',
			'sql_values'	=> array(),
		);
	}
}
?>