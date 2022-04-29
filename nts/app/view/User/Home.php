<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �ۡ�����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserHome extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		$db =& $this->backend->getDB();
		
		// snsv���Τ餻�����
		$sns_info = $this->config->get('sns_info');
		$um = $this->backend->getManager('Util');
		$this->af->setAppNE('sns_information', $um->convertHtml($sns_info['sns_information']));
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// �����å������η�������
		$sqlWhere = "m.message_status_to = 1 AND m.to_user_id = ? AND m.from_user_id = u.user_id AND u.user_status = 2 AND message_status = 1";
		$sqlValues = array($user['user_id']);
		
		$param = array(
			'sql_select'	=> 'message_id',
			'sql_from'		=> 'message m, user u',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('new_message_count', count($r)); 
		
/*
		// searchProp�ϻȤäƤϤ����ʤ�
		$message = &new Tv_Message($this->backend);
		$messageList = &$message->searchProp(
			array('message_id'),
			array('to_user_id' => $user['user_id'],
				'message_status_to' => 1,
				)
			);
		$this->af->setApp('new_message_count', $messageList[0]);
*/
		
		// ͧ�ͥꥹ�Ⱦ�ǧ�Ԥ��Ϳ������
		$sqlWhere = "f.friend_status = 1 AND f.to_user_id = ? AND f.from_user_id = u.user_id AND u.user_status = 2";
		$sqlValues = array($user['user_id']);
		
		$param = array(
			'sql_select'	=> 'friend_id',
			'sql_from'		=> 'friend f, user u',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('waiting_friend_count', count($r));
		
/*
		// searchProp�ϻȤäƤϤ����ʤ�
		$friend = &new Tv_Friend($this->backend);
		$friendList = &$friend->searchProp(
			array('friend_id'),
			array('to_user_id' => $user['user_id'],
				'friend_status' => 1,
				)
			);
		$this->af->setApp('waiting_friend_count', $friendList[0]);
*/
		
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
		/*
		$communityMember = &new Tv_CommunityMember($this->backend);
		$communityList = $communityMember->searchProp(
			array('community_id'),
			array('user_id' => $user['user_id'],
				'community_member_status' => 2,
				)
			);
		*/
		
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
		$friend = &new Tv_Friend($this->backend);
		$friendList = $friend->searchProp(
			array('to_user_id'),
			array('from_user_id' => $user['user_id'],
				'friend_status' => 2,
				)
			);
		$blogArticle = &new Tv_BlogArticle($this->backend);
		$articleList = array();
		// ͧã����׻�
		$friend_count = 0;
		foreach($friendList[1] as $friend){
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
					'twitter_status'	  => 0,
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
		/*
		$communityMember = &new Tv_CommunityMember($this->backend);
		$communityList2 = $communityMember->searchProp(
			array('community_id'),
			array('user_id' => $user['user_id'],
				'community_member_status' => 1,
				)
			);
		*/
		
		$communityList[1] = array_merge($communityList[1], $communityList2[1]);
		// ���å��ߥ�˥ƥ���
		$this->af->setApp('community_count', $communityList[0] + $communityList2[0]);
		
		$communityArticle = &new Tv_CommunityArticle($this->backend);
		$articleList = array();
		foreach($communityList[1] as $community){ 
			// ���ߥ�˥ƥ����Ȥ�1���ְ���˥����Ȥ��Ĥ����ȥԥå������
			$updateArticleList = $communityArticle->searchProp(
				array('community_article_id', 'community_article_title', 'community_article_comment_time', 'community_id', 'user_id', 'community_article_comment_num'),
				array(
					'community_id' => $community['community_id'],
					'community_article_status' => 1,
				)
			); 
			// ���ߥ�˥ƥ������ơ�����ͭ�������ʺ������Ƥ��ʤ�����
			$community_obj = &new Tv_Community($this->backend);
			$community_status = $community_obj->searchProp(
				array('community_status'),
				array('community_id' => $community['community_id'],
					'community_status' => 1
					)
				);
			if($updateArticleList[0] > 0 && $community_status[0] > 0){
				foreach($updateArticleList[1] as $key => $item){
					//���ߥ�˥ƥ��ȥԥå��祹�ơ�����ͭ������
					$user_obj =& new Tv_User($this->backend);
					$user_status = $user_obj->searchProp(
						array('user_status'),
						array(
							'user_id' => $item['user_id'],
							'user_status' => 2 
						)
					);
					// �ܲ���Ǥʤ�����ɽ�����ʤ�
					if($user_status[0] == 0) continue;
					
					$community = &new Tv_Community($this->backend,'community_id',$item['community_id']);
					$updateArticleList[1][$key]['community_title'] = $community->get('community_title');
					$updateArticleList[1][$key]['community_image_id'] = $community->get('image_id');
					$articleList[] = $updateArticleList[1][$key];
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
								.' AND u.user_id = c.user_id AND u.user_id <> ? AND u.user_status = 2 AND b.blog_article_status = ? AND c.blog_comment_status = ? AND c.blog_comment_notice = ? AND b.twitter_status = 0',
			'sql_values'	=> array($user['user_id'],$user['user_id'],1,1,1),
			'sql_order'		=> 'b.blog_article_id desc',
		);
		
		/*
		$param = array(
			'sql_select'	=> 'b.blog_article_id',
			'sql_from'		=> 'blog_article b, user u',
			'sql_where'		=> 'b.user_id = u.user_id AND u.user_id = ? AND b.blog_article_notice = ?',
			'sql_values'	=> array($user['user_id'],1),
			'sql_order'		=> 'blog_article_id desc',
		);
		*/
		$waitingBlogCommentList = $um->dataQuery($param);
		if(count($waitingBlogCommentList)>0){
			$this->af->setApp('waiting_blog_comment_count', count($waitingBlogCommentList));
			$this->af->setApp('waiting_blog_article_id', $waitingBlogCommentList[0][blog_article_id]);
		}
		
		// ̤�ɽ񤭹��ߤΤ��������Ĥΰ��������
		$param = array(
			'sql_select'	=> 'b.bbs_id, b.from_user_id',
			'sql_from'		=> 'bbs b, user u',
			//'sql_where'		=> 'b.to_user_id = u.user_id AND u.user_id = ? AND b.bbs_notice = ? ',
			'sql_where'		=> 'b.to_user_id = ? AND u.user_id = b.from_user_id AND u.user_status = 2 AND b.bbs_status = ? AND b.bbs_notice = ? ',
			'sql_values'	=> array($user['user_id'],1,1),
			'sql_order'		=> 'bbs_id desc',
		);
		$waitingBbsList = $um->dataQuery($param); 
		
		if(count($waitingBbsList)>0){
			$this->af->setApp('waiting_bbs_count', count($waitingBbsList));
		}
		
		// ���Τ������ΰ��������
		$whereArray = array();
		$bl_id_array = array();
		// �֥�å��ꥹ�Ȥ��θ
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ���Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'bl.black_list_deny_user_id = ? AND u.user_id = bl.black_list_user_id AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		
		// ��ʬ���֥�å��ꥹ�Ȥ���Ͽ����Ƥ���桼���������뤫
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_deny_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'u.user_id = bl.black_list_deny_user_id AND bl.black_list_user_id = ? AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// �����SQL�Ǹ��˹Ԥ��ʤ�
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		$whereStr = ' u.user_id = b.user_id ';
		if(count($bl_id_array)){
			$whereStr .= ' AND u.user_id not in ('.implode(',',$bl_id_array).')';
		}
		$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 AND b.twitter_status = 0';
		
		
		$param = array(
				'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
				'sql_from'		=> 'user u, blog_article b ',
				'sql_where'		=> $whereStr,
				'sql_values'	=> array(),
				'sql_order'		=> 'b.blog_article_id DESC',
				'sql_num'		=> 5,
		);
		$wholediaryList = $um->dataQuery($param);
		if(count($wholediaryList)>0){
			$this->af->setApp('whole_blog_article_list', $wholediaryList);
		}
		
		// �˥塼�������μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_AVATAR);
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
		
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
