<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �֥������������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogArticleList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �桼���Υ˥å��͡�������
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		$this->af->setApp('user_nickname', $user->get('user_nickname'));
		
		// �ꥹ�ȥӥ塼
		$sqlWhere = "user_id = ? AND blog_article_status = 1";
		$sqlValues = array($this->af->get('user_id'));
		
		// �����桼����ɮ�Ԥ�ͧã���ɤ��������
		$um =& $this->backend->getManager('user');
		$user_session = $this->session->get('user');
		switch($um->getUserRelation($this->af->get('user_id'), $user_session['user_id']))
		{
		case 0: // ͧã�ǤϤʤ�
			$sqlWhere .= ' AND blog_article_public = 1';
			break;
		case 1: // ͧã
			$sqlWhere .= ' AND blog_article_public <> 0';
			break;
		}
		//$sqlWhere .= ' AND twitter_status = 0 ';
		
		$this->listview = array(
			'action_name'	=> 'user_blog_article_list',
			'sql_select'
				=> 'blog_article_id,blog_article_title,blog_article_created_time,' .
				'blog_article_body,blog_article_comment_num,blog_article_notice,twitter_status',
			'sql_from'		=> 'blog_article',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'blog_article_created_time DESC',
			'sql_values'		=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}

?>
