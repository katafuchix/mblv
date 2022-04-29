<?php
/**
 * Recent.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ͧ�ͤκǿ������������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogRecent extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user = $this->session->get('user');

		// ͧã�ǿ����������
		// ͧ�Ͱ��������
		$friend = &new Tv_Friend($this->backend);
		$friendList = $friend->searchProp(
			array('to_user_id'),
			array('from_user_id' => $user['user_id'],
				'friend_status' => 2,
				)
			);
		
		// ͧã���Ȥ˺ǿ�(1���ְ���)�����������
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
		// ͧ�ͤκǿ��������������
		$this->af->setApp('blog_article_list', $articleList);
	}
	
	/**
	 * �֥������ο������
	 * 
	 * @access	private
	 * @param	array	a	['blog_article_created_time']��ޤ�����
	 * @param	array	b	['blog_article_created_time']��ޤ�����
	 * @return	a��b���Ť��ʤ�1, �������ʤ�-1, a��b��Ʊ���ʤ�0
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