<?php
/**
 * Recent.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 友人の最新日記一覧画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogRecent extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user = $this->session->get('user');

		// 友達最新日記を取得
		// 友人一覧を取得
		$friend = &new Tv_Friend($this->backend);
		$friendList = $friend->searchProp(
			array('to_user_id'),
			array('from_user_id' => $user['user_id'],
				'friend_status' => 2,
				)
			);
		
		// 友達ごとに最新(1週間以内)の日記を取得
		$blogArticle = &new Tv_BlogArticle($this->backend);
		$articleList = array();
		foreach($friendList[1] as $friend){ 
			$latestArticle = $blogArticle->searchProp(
				array('blog_article_id',
					'blog_article_title',
					'blog_article_created_time',
					'user_id'
					),
				array('user_id' => $friend['to_user_id'],
					'blog_article_status' => 1,
					'blog_article_created_time' => new Ethna_AppSearchObject(date('Y-m-d H:i:s', strtotime('-1 week')), OBJECT_CONDITION_GT),
					),
				array('blog_article_id' => OBJECT_SORT_DESC),
				0,
				1
				);
			if($latestArticle[0] > 0){
				$userObj = &new Tv_User($this->backend,
					'user_id',
					$latestArticle[1][0]['user_id']
					);
				$latestArticle[1][0]['user_nickname'] = $userObj->get('user_nickname');
				$articleList[] = $latestArticle[1][0];
			}
		}
		usort($articleList, array($this, '_cmpBlogArticle'));
		// 友人の最新日記一覧を出力
		$this->af->setApp('blog_article_list', $articleList);
	}
	
	/**
	 * ブログ記事の新旧比較
	 * 
	 * @access	private
	 * @param	array	a	['blog_article_created_time']を含む配列
	 * @param	array	b	['blog_article_created_time']を含む配列
	 * @return	aがbより古いなら1, 新しいなら-1, aとbが同時なら0
	 */
	function _cmpBlogArticle($a, $b)
	{
		if($a['blog_article_created_time'] == $b['blog_article_created_time']){
			return 0;
		}
		return (strtotime($a['blog_article_created_time']) < strtotime($b['blog_article_created_time'])) ? 1 : -1;
	}
}
?>