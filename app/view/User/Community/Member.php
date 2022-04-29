<?php
/**
 * Member.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ߥ�˥ƥ����а������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommunityMember extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ��������
		$c = new Tv_Community($this->backend, 'community_id', $this->af->get('community_id'));
		$this->af->setApp('community', $c->getNameObject());
		
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'c.community_id = ? ' .
				'AND c.user_id = u.user_id ' .
				'AND c.community_member_status  <> 0 ' . // community_member_status 0:���С�������, 1:���С�, 2:������, 3:�����;�ǧ�Ԥ�,
				'AND c.community_member_status  <> 3 ' .
				'AND u.user_status = 2 ' ;			// user_status �桼�������ơ����� ��1:����Ͽ, 2:����Ͽ, 3:���, 4:��������
		$sqlValues = array($this->af->get('community_id'));
		$this->listview = array(
			'action_name'	=> 'user_community_member',
			'sql_select'	=> '*',
			'sql_from'		=> 'user as u, community_member as c ',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.community_member_id ASC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>