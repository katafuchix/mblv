<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������������������̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogArticleList extends Tv_ListViewClass
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
			// �桼��ID����
			'user_id' => array(
				'column' => 'ba.user_id',
			),
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
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
			// �����������ơ���������
			'blog_article_status' => array(
				'column' => 'ba.blog_article_status',
			),
			// ���������ƻ륹�ơ���������
			'blog_article_checked' => array(
				'column' => 'ba.blog_article_checked',
			),
			// �����������
			'blog_article_created' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_created_time',
			),
			// ������������
			'blog_article_updated' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_updated_time',
			),
			// �����������
			'blog_article_deleted' => array(
				'type' => 'PERIOD',
				'column' => 'ba.blog_article_deleted_time',
			),
			// �������긡��
			'blog_article_public' => array(
				'column' => 'ba.blog_article_public',
			),
		);
		
		// ������̤Ǥϥ��ơ���������ͭ���פΥǡ����Τ߼�������
		if($this->af->get('blog_article_status') == "") $this->af->set('blog_article_status', 1);
		
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .=  ' u.user_id = ba.user_id';
		
		// �ڡ�����
		$this->listview = array(
			'sql_select'	=> 
				'u.user_id,u.user_nickname,
				ba.blog_article_id,ba.blog_article_title,ba.blog_article_body,ba.blog_article_status,ba.blog_article_checked,ba.blog_article_created_time,ba.blog_article_updated_time,ba.blog_article_deleted_time,ba.blog_article_public,
				ba.image_id',
			//'sql_from'	=> 'user as u,blog_article as ba',
			'sql_from'	=> 'user as u,blog_article as ba LEFT JOIN image ON ba.image_id = image.image_id ',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'ba.blog_article_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
	}
}
?>