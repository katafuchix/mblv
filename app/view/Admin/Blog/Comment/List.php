<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������Ȱ������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogCommentList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// ������������
		$condition = array(
			// ��������ID����
			'blog_article_id' => array(
				'column' => 'ba.blog_article_id',
			),
			// �������������ȥ븡��
			'blog_article_title' => array(
				'type' => 'LIKE',
				'column' => 'ba.blog_article_title',
			),
			// ����������ʸ����
			'blog_article_body' => array(
				'type' => 'LIKE',
				'column' => 'ba.blog_article_body',
			),
			// ����������ID����
			'blog_comment_id' => array(
				'column' => 'bc.blog_comment_id',
			),
			// ������������ʸ����
			'blog_comment_body' => array(
				'type' => 'LIKE',
				'column' => 'bc.blog_comment_body',
			),
			//�����Ȥ����桼��ID����
			'user_id' => array(
				'column' => 'bc.user_id',
			),
			// �����Ȥ����桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
			// ���������ȥ��ơ���������
			'blog_comment_status' => array(
				'column' => 'bc.blog_comment_status',
			),
			// ���������ȴƻ륹�ơ���������
			'blog_comment_checked' => array(
				'column' => 'bc.blog_comment_checked',
			),
			// �����������
			'blog_comment_created' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_created_time',
			),
			// ������������
			'blog_comment_updated' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_updated_time',
			),
			// �����������
			'blog_comment_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'bc.blog_comment_deleted_time',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('blog_comment_status') == "") $this->af->set('blog_comment_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// �����
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' bc.user_id=u.user_id AND bc.blog_article_id=ba.blog_article_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_nickname,
				ba.blog_article_id,ba.blog_article_title,ba.blog_article_body,bc.image_id,
				bc.blog_comment_id,bc.user_id,bc.blog_comment_body,bc.blog_comment_status,bc.blog_comment_checked,bc.blog_comment_created_time,bc.blog_comment_updated_time,bc.blog_comment_deleted_time',
			//'sql_from'	=> 'user as u,blog_comment as bc,blog_article as ba',
			'sql_from'	=> 'user as u,blog_article as ba, blog_comment as bc LEFT JOIN image ON bc.image_id = image.image_id ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'bc.blog_comment_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>