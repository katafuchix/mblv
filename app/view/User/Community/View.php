<?php
/**
 * View.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ߥ�˥ƥ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserCommunityView extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ���ߥ�˥ƥ�����
		$community = &new Tv_Community($this->backend,
			'community_id',
			$this->af->get('community_id')
			);
		$this->af->setApp('community', $community->getNameObject());
		
		// ���ƥ������
		$cca = &new Tv_CommunityCategory($this->backend,
			'community_category_id',
			$community->get('community_category_id')
			);
		$this->af->setApp('category', $cca->get('community_category_name'));
		
		// �����ͤ򸡺�
		$community_admin = &new Tv_CommunityMember($this->backend);
		$community_admin_list = $community_admin->searchProp(
			array('user_id'),
			array('community_id' => $this->af->get('community_id'),
				'community_member_status' => 2,
				)
			);
		// �����;������
		$administrator = &new Tv_User($this->backend,
			array('user_id'),
			$community_admin_list[1][0]['user_id']
			);
		$this->af->setApp('admin', $administrator->getNameObject());
		
		// ����ȥԥå���������
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' community_article_id, community_article_title, community_article_comment_num, community_article_created_time',
			'sql_from'		=> ' community_article ',
			'sql_where'		=> ' community_id = ? AND community_article_status = ? ',
			'sql_values'	=> array( $this->af->get('community_id'), 1 ),
			'sql_order'		=> ' community_article_comment_time desc ',
			'sql_num'		=> 3,
		);		
		
		$article_list = $um->dataQuery($param);
		$this->af->setApp('article_list', $article_list);
		
		// �桼���θ����������
		$user = $this->session->get('user');
		$communityMemberManager = &$this->backend->getManager('CommunityMember');
		$userStatus = $communityMemberManager->getUserStatus($this->af->get('community_id'),
			$user['user_id']
			);
		$this->af->setApp('user_status', $userStatus);
	}
}
?>