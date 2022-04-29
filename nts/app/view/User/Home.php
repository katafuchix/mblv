<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ホーム画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserHome extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		$db =& $this->backend->getDB();
		
		// snsvお知らせを取得
		$sns_info = $this->config->get('sns_info');
		$um = $this->backend->getManager('Util');
		$this->af->setAppNE('sns_information', $um->convertHtml($sns_info['sns_information']));
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// 新着メッセージの件数を取得
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
		// searchPropは使ってはいけない
		$message = &new Tv_Message($this->backend);
		$messageList = &$message->searchProp(
			array('message_id'),
			array('to_user_id' => $user['user_id'],
				'message_status_to' => 1,
				)
			);
		$this->af->setApp('new_message_count', $messageList[0]);
*/
		
		// 友人リスト承認待ち人数を取得
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
		// searchPropは使ってはいけない
		$friend = &new Tv_Friend($this->backend);
		$friendList = &$friend->searchProp(
			array('friend_id'),
			array('to_user_id' => $user['user_id'],
				'friend_status' => 1,
				)
			);
		$this->af->setApp('waiting_friend_count', $friendList[0]);
*/
		
		// コミュニティ参加承認待ち人数を取得
		// 自分が管理人のコミュニティを取得
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
			// 承認待ち一覧を取得
			$userList = $communityMember->searchId(
				array('community_id' => $community['community_id'],
					'community_member_status' => 3,
					)
				);
			$waitingCommunityUserCount += $userList[0];
		}
		$this->af->setApp('waiting_community_user_count', $waitingCommunityUserCount);
		
		// 友達最新日記を取得
		// 友人一覧を取得
		$friend = &new Tv_Friend($this->backend);
		$friendList = $friend->searchProp(
			array('to_user_id'),
			array('from_user_id' => $user['user_id'],
				'friend_status' => 2,
				)
			);
		$blogArticle = &new Tv_BlogArticle($this->backend);
		$articleList = array();
		// 友達数を計算
		$friend_count = 0;
		foreach($friendList[1] as $friend){
			// 友達がすでに退会している場合は表示しない
			$userObject = &new Tv_User($this->backend, 'user_id', $friend['to_user_id']);
			if(!$userObject->isValid() || $userObject->get('user_status') != 2) continue;
			// 友達ごとに最新の日記を取得
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
			// 友達数を計算
			$friend_count++;
		}
		
		usort($articleList, array($this, '_cmpBlogArticle'));
		$this->af->setApp('blog_article_list', $articleList);
		// 友達数
		$this->af->setApp('friend_count', $friend_count);
		
		// コミュニティの最新コメントを取得
		// 参加コミュニティ一覧を取得
		// （管理人をしているコミュニティ一覧は既に取得しているので、一般メンバーのもののみ）
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
		// 参加コミュニティ数
		$this->af->setApp('community_count', $communityList[0] + $communityList2[0]);
		
		$communityArticle = &new Tv_CommunityArticle($this->backend);
		$articleList = array();
		foreach($communityList[1] as $community){ 
			// コミュニティごとに1週間以内にコメントがついたトピックを取得
			$updateArticleList = $communityArticle->searchProp(
				array('community_article_id', 'community_article_title', 'community_article_comment_time', 'community_id', 'user_id', 'community_article_comment_num'),
				array(
					'community_id' => $community['community_id'],
					'community_article_status' => 1,
				)
			); 
			// コミュニティがステータス有効か？（削除されていないか）
			$community_obj = &new Tv_Community($this->backend);
			$community_status = $community_obj->searchProp(
				array('community_status'),
				array('community_id' => $community['community_id'],
					'community_status' => 1
					)
				);
			if($updateArticleList[0] > 0 && $community_status[0] > 0){
				foreach($updateArticleList[1] as $key => $item){
					//コミュニティトピック主ステータス有効か？
					$user_obj =& new Tv_User($this->backend);
					$user_status = $user_obj->searchProp(
						array('user_status'),
						array(
							'user_id' => $item['user_id'],
							'user_status' => 2 
						)
					);
					// 本会員でない場合は表示しない
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
		
		
		// 未読コメントのある日記の一覧を取得
		
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
		
		// 未読書き込みのある伝言板の一覧を取得
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
		
		// 全体の日記の一覧を取得
		$whereArray = array();
		$bl_id_array = array();
		// ブラックリストを考慮
		// 自分がブラックリストに登録しているユーザーがあるか
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'bl.black_list_deny_user_id = ? AND u.user_id = bl.black_list_user_id AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// あればSQLで見に行かない
		if(count($r)>0){
			foreach($r as $k=>$v){
				$bl_id_array[] = $v['bl_user_id'];
			}
		}
		
		
		// 自分がブラックリストに登録されているユーザーがあるか
		$param = array(
				//'sql_select'	=> 'black_list_id',
				'sql_select'	=> 'bl.black_list_deny_user_id as bl_user_id',
				'sql_from'		=> 'user u, black_list bl',
				'sql_where'		=> 'u.user_id = bl.black_list_deny_user_id AND bl.black_list_user_id = ? AND bl.black_list_status= 1 AND user_status = 2',
				'sql_values'	=> array($user['user_id']),
		);
		$r = $um->dataQuery($param); 
		// あればSQLで見に行かない
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
		
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_AVATAR);
		// リストビュー
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
	 * ブログ記事更新日時比較関数
	 * 
	 * @access	private
	 * @param	array	a	['blog_article_created_time']を含む記事情報配列a
	 * @param	array	b	['blog_article_created_time']を含む記事情報配列b
	 * @return	integer	aがbより古いなら1, 同じなら0, aがbより新しいなら-1
	 */
	function _cmpBlogArticle($a, $b)
	{
		if($a['blog_article_created_time'] == $b['blog_article_created_time']){
			return 0;
		}
		return (strtotime($a['blog_article_created_time']) < strtotime($b['blog_article_created_time'])) ? 1 : -1;
	}
	
	/**
	 * コミュニティ記事更新日時比較関数
	 * 
	 * @access	private
	 * @param	array	a	['community_article_created_time']を含む記事情報配列a
	 * @param	array	b	['community_article_created_time']を含む記事情報配列b
	 * @return	integer	aがbより古いなら1, 同じなら0, aがbより新しいなら-1
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
