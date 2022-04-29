<?php
/**
 * Top.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * �ݡ�������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserTop extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// ��������Τ����Υ桼�����κǿ�����5����������
		$user_session = $this->session->get('user');
		if($user_session['user_id']){
			$um = $this->backend->getManager('Util');
			// ���Τ������ΰ��������
			// status: 1 �����Τ�
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
					'sql_num'		=> 5,
			);
			$wholediaryList = $um->dataQuery($param);
			if(count($wholediaryList)>0){
				$this->af->setApp('whole_blog_article_list', $wholediaryList);
			}
		}
		// �˥塼�������μ���
		// ���ơ�������ͭ����°���Τ�ɽ������
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// �ۿ�����������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// �ۿ���λ������ͭ���ʤ�ΤΤ�ɽ������
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_TOP);
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
}

?>
