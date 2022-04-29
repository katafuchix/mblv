<?php
/**
 * Search.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogArticleSearch extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// �ꥹ�ȥӥ塼
		$sqlValues = array();
		if($this->af->get('keyword') != ''){
			// ������ɤ����Ϥ���Ƥ�����
			// ���ڡ������ڤ�ǥ�����ɤ�ʬ��
			$keyword = str_replace('��', ' ', $this->af->get('keyword'));
			$keywordList = explode(' ', $keyword);
			
			// ��ʸ�������
			foreach($keywordList as $key => $word){
				if($word == ''){
					unset($keywordList[$key]);
				}
			}
			
			if(!count($keywordList)){
				// ������ɤ����ڡ����������Ϥ���Ƥ��ʤ��ä����
				
			}else{
				// ����
				// �����ϰϤ򸡺���̤�ȿ��
//				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public_status = 1';
				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public=1';	// ��̤�ͧã�ޤǸ����ε�����ޤ��ʤ��׸�Ƥ
				foreach($keywordList as $word){
					$sqlWhere .= " AND (ba.blog_article_title LIKE ? OR ba.blog_article_body LIKE ?)";
					$sqlValues[] = "%{$word}%";
					$sqlValues[] = "%{$word}%";
				}
				$this->listview = array(
					'sql_select'	=> '*',
					'sql_from'	=> 'user as u,blog_article as ba',
					'sql_where'	=> $sqlWhere,
					'sql_order'	=> 'ba.blog_article_updated_time DESC',
					'sql_values'	=> $sqlValues,
					'sql_num'	=> 10,
				);
			}
		}
	}
}
?>