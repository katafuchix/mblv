<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������ߥ�˥ƥ��ȥԥå������ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityArticleList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(
				'column' => 'ca.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ���ߥ�˥ƥ��ȥԥå������ȥ��
			'community_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_title',
			),
			// ���ߥ�˥ƥ��ȥԥå���ʸ��
			'community_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_body',
			),
			// ���ߥ�˥ƥ��ȥԥå����ơ���������
			'community_article_status' => array(
				'column' => 'ca.community_article_status',
			),
			// ���ߥ�˥ƥ��ȥԥå��ƻ륹�ơ���������
			'community_article_checked' => array(
				'column' => 'ca.community_article_checked',
			),
			// ������������
			'community_article_created' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_created_time',
			),
			// ������������
			'community_article_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_updated_time',
			),
			// �����������
			'community_article_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ca.community_article_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		/*
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id=ca.user_id AND c.community_id=ca.community_id';
		*/
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,
				c.community_title,
				ca.community_article_id,ca.community_article_body,ca.community_article_title,ca.community_article_status,ca.community_article_checked,ca.community_article_created_time,ca.community_article_updated_time,ca.community_article_deleted_time',
			'sql_from'	=> 'community as c JOIN community_article as ca ON c.community_id=ca.community_id JOIN user as u ON u.user_id=ca.user_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ca.community_article_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>