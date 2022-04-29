<?php
/**
 * List.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ������������̥ӥ塼���饹
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleList extends Tv_ListViewClass
{
	/**
	 *	����ɽ��������
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		// �ꥹ�ȥӥ塼
		$sql_where = "community_id = ? AND community_article_status = 1";
		$sql_values = array($this->af->get('community_id'));
		
		$this->listview = array(
			'action_name'	=> 'user_community_article_list',
			'sql_select'
				=> 'community_article_id, community_article_title, community_article_comment_num',
			'sql_from'		=> 'community_article',
			'sql_where'		=> $sql_where,
			'sql_order'		=> 'community_article_comment_time DESC',
			'sql_values'	=> $sql_values,
			'sql_num'		=> 5,
		);
	}
}
?>