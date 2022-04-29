<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ߥ�˥ƥ������Ȱ����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminCommunityCommentList extends Tv_ListViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// �桼��ID����
			'user_id' => array(
				'column' => 'cc.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ���ߥ�˥ƥ��ȥ�����ID����
			'community_comment_id' => array(
				'column' => 'cc.community_comment_id',
			),
			// ���ߥ�˥ƥ��ȥ�������ʸ����
			'community_comment_body' => array(
				'column' => 'cc.community_comment_body',
			),
			// ���ߥ�˥ƥ��ȥԥå�ID����
			'community_article_id' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_id',
			),
			// ���ߥ�˥ƥ��ȥԥå������ȥ븡��
			'community_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_title',
			),
			// ���ߥ�˥ƥ��ȥԥå���ʸ��
			'community_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ca.community_article_body',
			),
			// ���ߥ�˥ƥ������ȥ��ơ���������
			'community_comment_status' => array(
				'column' => 'cc.community_comment_status',
			),
			// ���ߥ�˥ƥ��ȥԥå��ƻ륹�ơ���������
			'community_article_checked' => array(
				'column' => 'ca.community_article_checked',
			),
			// ������������
			'community_comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_created_time',
			),
			// ������������
			'community_comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_updated_time',
			),
			// �����������
			'community_comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'cc.community_comment_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('community_comment_status') == "") $this->af->set('community_comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' cc.community_article_id = ca.community_article_id AND cc.user_id = u.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,u.user_status,
				cc.community_comment_id,cc.community_comment_body,cc.community_comment_status,cc.community_comment_checked,cc.community_comment_created_time,cc.community_comment_updated_time,cc.community_comment_deleted_time,
				ca.community_article_id,ca.community_article_title,ca.community_article_body,cc.image_id',
			'sql_from'	=> 'user as u,community_article as ca,community_comment as cc LEFT JOIN image ON cc.image_id = image.image_id',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'cc.community_comment_updated_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>