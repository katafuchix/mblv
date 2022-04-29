<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������Ȱ����ӥ塼���饹
 * 
 * @author Technovarth
 * @ac.ss public
 * @package SNSV
 */
class Tv_View_AdminCommentList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @ac.ss public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(
				'column' => 'c.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ������ID����
			'comment_id' => array(
				'column' => 'c.comment_id',
			),
			// ��������ʸ����
			'comment_body' => array(
				'type' => 'LIKE',
				'column' => 'c.comment_body',
			),
			/*
			// ���ߥ�˥ƥ��ȥԥå�ID����
			'article_id' => array(
				'type' => 'LIKE',
				'column' => 'ca.article_id',
			),
			// ���ߥ�˥ƥ��ȥԥå������ȥ븡��
			'article_title' => array(
				'type' => 'LIKE',
				'column' => 'ca.article_title',
			),
			// ���ߥ�˥ƥ��ȥԥå���ʸ��
			'article_body' => array(
				'type' => 'LIKE',
				'column' => 'ca.article_body',
			),
			// ���ߥ�˥ƥ��ȥԥå����ơ���������
			'article_status' => array(
				'column' => 'ca.article_status',
			),
			// ���ߥ�˥ƥ��ȥԥå��ƻ륹�ơ���������
			'article_checked' => array(
				'column' => 'ca.article_checked',
			),
			*/
			// ������������
			'comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_created_time',
			),
			// ������������
			'comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_updated_time',
			),
			// �����������
			'comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'c.comment_deleted_time',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' c.user_id = u.user_id';
//		$sqlWhere .=  ' c.user_id = u.user_id AND c.article_id = ca.article_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,u.user_status,
				c.comment_id,c.comment_body,c.comment_status,c.comment_checked,c.comment_created_time,c.comment_updated_time,c.comment_deleted_time',
//				ca.article_id,ca.article_title,ca.article_body',
			'sql_from'	=> 'user as u,comment as c',
//			'sql_from'	=> 'user as u,article as ca,comment as c.,
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'c.comment_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>