<?php
/**
 * Recent.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ最新コメント画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityRecent extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$user = $this->session->get('user');
		$community =& new Tv_Community($this->backend);
		
		$communityMember =& new Tv_CommunityMember($this->backend);
		$communityList = $communityMember->searchProp(
			array('community_id'),
			array(
				'user_id' => $user['user_id'],
				'community_member_status' => 2,
			)
		);

		//$communityMember =& new Tv_CommunityMember($this->backend);
		$communityList2 = $communityMember->searchProp(
			array('community_id'),
			array(
				'user_id' => $user['user_id'],
				'community_member_status' => 1,
			)
		);
		$communityList[1] = array_merge($communityList[1], $communityList2[1]);
		$communityArticle =& new Tv_CommunityArticle($this->backend);
		$articleList = array();
		foreach($communityList[1] as $community)
		{
			// コミュニティごとに1週間以内にコメントがついたトピックを取得
			$updateArticleList = $communityArticle->searchProp(
				array('community_article_id', 'community_article_title', 'community_article_comment_time', 'community_id', 'user_id'),
				array(
					'community_id' => $community['community_id'],
					'community_article_status'	=> 1,
					'community_article_comment_time'
						=> new Ethna_AppSearchObject(date('Y-m-d H:i:s', strtotime('-1 week')), OBJECT_CONDITION_GT),
				)
			);

			//コミュニティがステータス有効か？（削除されていないか）
			$community_obj =& new Tv_Community($this->backend);
			$community_status = $community_obj->searchProp(
				array('community_status'),
				array(
					'community_id' => $community['community_id'],
					'community_status' => 1 
				)
			);

			if($updateArticleList[0] > 0 && $community_status[0] > 0){
				foreach($updateArticleList[1] as $key => $item)
				{
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

					$community =& new Tv_Community(
						$this->backend,
						'community_id',
						$item['community_id']
					);
					$updateArticleList[1][$key]['community_title'] = $community->get('community_title');
					$articleList[] = $updateArticleList[1][$key];
				}
			}
		}
		usort($articleList, array($this, '_cmpCommunityArticle'));
		$this->af->setApp('communityArticleList', $articleList);
	}
	
	function _cmpCommunityArticle($a, $b)
	{
		if($a['community_article_comment_time'] == $b['community_article_comment_time']){
			return 0;
		}
		return (strtotime($a['community_article_comment_time']) < strtotime($b['community_article_comment_time'])) ? 1 : -1;
	}
	
}
?>
