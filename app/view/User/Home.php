<?php
/**
 * Home.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �ۡ�����̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserHome extends Tv_ViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		$db	=& $this->backend->getDB();
		$um = $this->backend->getManager('Util');
		
		// snsv���Τ餻�����
		$sns_info = $this->config->get('sns_info');
		$this->af->setAppNE('sns_information', $sns_info['sns_information']);
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// �����å������η�������
		// ̤�ɤǤ��ꡢ�������桼����������Ͽ�Ǥ��뤳��
		$param = array(
			'sql_select'	=> ' message_id ',
			'sql_from'		=> ' message m, user u',
			'sql_where'		=> 'm.to_user_id = ? AND m.from_user_id = u.user_id AND u.user_status = ? AND m.message_status = ? AND m.message_status_to = ? ',
			'sql_values'	=> array( $user['user_id'], 2, 1 ,1),
		);
		$messageList = $um->dataQuery($param);
		$this->af->setApp('new_message_count', count($messageList));
		
		
		// ͧ�ͥꥹ�Ⱦ�ǧ�Ԥ��Ϳ������
		$param = array(
			'sql_select'	=> ' friend_id ',
			'sql_from'		=> ' friend ',
			'sql_where'		=> 'to_user_id = ? AND friend_status = ? ',
			'sql_values'	=> array( $user['user_id'], 1 ),
		);
		$friendList = $um->dataQuery($param);
		$this->af->setApp('waiting_friend_count', count($friendList));
		
		
		// ���ߥ�˥ƥ����þ�ǧ�Ԥ��Ϳ������
		// ��ʬ�������ͤΥ��ߥ�˥ƥ������
		$query = 'SELECT community_member.community_id 
			FROM community_member, community 
			WHERE user_id = ? 
				AND community_member_status = 2 
				AND community_member.community_id = community.community_id 
				AND community.community_status = 1';
		$values = array($user['user_id']);
		$communityList = array();
		$communityList[1] = $db->db->getAll($query, $values, DB_FETCHMODE_ASSOC);
		$communityList[0] = count($communityList[1]);
		
		$communityMember = &new Tv_CommunityMember($this->backend);
		$waitingCommunityUserCount = 0;
		foreach($communityList[1] as $community){
			// ��ǧ�Ԥ����������
			$userList = $communityMember->searchId(
				array('community_id' => $community['community_id'],
					'community_member_status' => 3,
					)
				);
			$waitingCommunityUserCount += $userList[0];
		}
		$this->af->setApp('waiting_community_user_count', $waitingCommunityUserCount);
		
		// ͧã�ǿ����������
		// ͧ�Ͱ��������
		$param = array(
			'sql_select'	=> ' to_user_id ',
			'sql_from'		=> ' friend ',
			'sql_where'		=> 'from_user_id = ? AND friend_status = ? ',
			'sql_values'	=> array( $user['user_id'], 2 ),
		);
		$friendList = $um->dataQuery($param);
		
		$blogArticle = &new Tv_BlogArticle($this->backend);
		$articleList = array();
		// ͧã����׻�
		$friend_count = 0;
		//foreach($friendList[1] as $friend){
		foreach($friendList as $friend){
			// ͧã�����Ǥ���񤷤Ƥ������ɽ�����ʤ�
			$userObject = &new Tv_User($this->backend, 'user_id', $friend['to_user_id']);
			if(!$userObject->isValid() || $userObject->get('user_status') != 2) continue;
			// ͧã���Ȥ˺ǿ������������
			$latestArticle = $blogArticle->searchProp(
				array('blog_article_id', 'blog_article_title', 'blog_article_created_time', 'user_id', 'blog_article_comment_num'),
				array(
					'user_id' => $friend['to_user_id'],
					'blog_article_status' => 1,
					'blog_article_public' => new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE),
				),
				array('blog_article_id' => OBJECT_SORT_DESC),
				0,
				1
			);
			if($latestArticle[0] > 0){
				$userObj = &new Tv_User($this->backend,'user_id',$latestArticle[1][0]['user_id']);
				$latestArticle[1][0]['user_nickname'] = $userObj->getName('user_nickname');
				$latestArticle[1][0]['user_image_id'] = $userObj->getName('image_id');
				$articleList[] = $latestArticle[1][0];
			}
			// ͧã����׻�
			$friend_count++;
		}
		usort($articleList, array($this, '_cmpBlogArticle'));
		$this->af->setApp('blog_article_list', $articleList);
		// ͧã��
		$this->af->setApp('friend_count', $friend_count);
		
		// ���ߥ�˥ƥ��κǿ������Ȥ����
		// ���å��ߥ�˥ƥ����������
		// �ʴ����ͤ򤷤Ƥ��륳�ߥ�˥ƥ������ϴ��˼������Ƥ���Τǡ����̥��С��Τ�ΤΤߡ�
		$query = 'SELECT community_member.community_id 
			FROM community_member, community 
			WHERE user_id = ? 
				AND community_member_status = 1 
				AND community_member.community_id = community.community_id 
				AND community.community_status = 1';
		$values = array($user['user_id']);
		$communityList2 = array();
		$communityList2[1] = $db->db->getAll($query, $values, DB_FETCHMODE_ASSOC);
		$communityList2[0] = count($communityList2[1]);
		
		$communityList[1] = array_merge($communityList[1], $communityList2[1]);
		// ���å��ߥ�˥ƥ���
		$this->af->setApp('community_count', $communityList[0] + $communityList2[0]);
		
		$communityArticle = &new Tv_CommunityArticle($this->backend);
		$articleList = array();
		foreach($communityList[1] as $community){ 
			// ���ߥ�˥ƥ����Ȥ�1���ְ���˥����Ȥ��Ĥ����ȥԥå������
			$param = array(
				'sql_select'	=> ' ca.community_article_id, ca.community_article_title, ca.community_article_comment_time, ca.community_id, ca.community_article_comment_num',
				'sql_from'		=> ' community_article ca, user u',
				'sql_where'		=> ' ca.community_id = ? AND ca.community_article_status = ? AND ca.user_id = u.user_id AND u.user_status = ?',
				'sql_values'	=> array( $community['community_id'], 1, 2 ),
			);
			$updateArticleList = $um->dataQuery($param);
		
			// ���ߥ�˥ƥ������ơ�����ͭ�������ʺ������Ƥ��ʤ�����
			$param = array(
				'sql_select'	=> ' community_status ',
				'sql_from'		=> ' community ',
				'sql_where'		=> 'community_id = ? AND community_status = ? ',
				'sql_values'	=> array( $community['community_id'], 1 ),
			);
			$community_status = $um->dataQuery($param);
			if((count($updateArticleList) > 0) && ($community_status[0]['community_status'] == 1)){
				foreach($updateArticleList as $key => $item){
					$community = &new Tv_Community($this->backend,'community_id',$item['community_id']);
					$updateArticleList[$key]['community_title'] = $community->get('community_title');
					$updateArticleList[$key]['community_image_id'] = $community->get('image_id');
					$articleList[] = $updateArticleList[$key];
				}
			}
		}
		usort($articleList, array($this, '_cmpCommunityArticle'));
		$this->af->setApp('community_article_list', $articleList);
		
		// ̤�ɥ����ȤΤ��������ΰ��������
		$param = array(
			'sql_select'	=> 'distinct b.blog_article_id ',
			'sql_from'		=> 'blog_comment c, user u, blog_article b',
			'sql_where'		=> 'b.user_id = ? AND b.blog_article_id = c.blog_article_id AND b.blog_article_status <> 0'
								.' AND u.user_id = c.user_id AND u.user_id <> ? AND u.user_status = 2 AND b.blog_article_status = ? AND c.blog_comment_status = ? AND c.blog_comment_notice = ? ',
			'sql_values'	=> array($user['user_id'],$user['user_id'],1,1,1),
			'sql_order'		=> 'b.blog_article_id desc',
		);
		$waitingBlogCommentList = $um->dataQuery($param);
		if(count($waitingBlogCommentList)>0){
			$this->af->setApp('waiting_blog_comment_count', count($waitingBlogCommentList));
			$this->af->setApp('waiting_blog_article_id', $waitingBlogCommentList[0][blog_article_id]);
		}
		
		// ̤�ɽ񤭹��ߤΤ��������Ĥΰ��������
		$param = array(
			'sql_select'	=> 'b.bbs_id',
			'sql_from'		=> 'bbs b, user u',
			'sql_where'		=> 'b.to_user_id = u.user_id AND u.user_id = ? AND b.bbs_status = ? AND b.bbs_notice = ? ',
			'sql_values'	=> array($user['user_id'],1,1),
			'sql_order'		=> 'bbs_id desc',
		);
		$waitingBbsList = $um->dataQuery($param);
		if(count($waitingBbsList)>0){
			$this->af->setApp('waiting_bbs_count', count($waitingBbsList));
		}
	}

	/**
	 * �֥���������������Ӵؿ�
	 * 
	 * @access	private
	 * @param	array	a	['blog_article_created_time']��ޤ൭����������a
	 * @param	array	b	['blog_article_created_time']��ޤ൭����������b
	 * @return	integer	a��b���Ť��ʤ�1, Ʊ���ʤ�0, a��b��꿷�����ʤ�-1
	 */
	function _cmpBlogArticle($a, $b)
	{
		if($a['blog_article_created_time'] == $b['blog_article_created_time']){
			return 0;
		}
		return (strtotime($a['blog_article_created_time']) < strtotime($b['blog_article_created_time'])) ? 1 : -1;
	}
	
	/**
	 * ���ߥ�˥ƥ���������������Ӵؿ�
	 * 
	 * @access	private
	 * @param	array	a	['community_article_created_time']��ޤ൭����������a
	 * @param	array	b	['community_article_created_time']��ޤ൭����������b
	 * @return	integer	a��b���Ť��ʤ�1, Ʊ���ʤ�0, a��b��꿷�����ʤ�-1
	 */
	function _cmpCommunityArticle($a, $b)
	{
		if($a['community_article_comment_time'] == $b['community_article_comment_time']){
			return 0;
		}
		return (strtotime($a['community_article_comment_time']) < strtotime($b['community_article_comment_time'])) ? 1 : -1;
	}
}
?>