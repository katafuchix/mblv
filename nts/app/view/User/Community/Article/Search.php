<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ������������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleSearch extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
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
				// �����ʾ�郎ʣ���ʤΤ�SQL�ˤ��ޤ�����
				$sqlWhere = 'c.community_status = 1 AND c.community_join_condition <= 2 AND c.community_id = ca.community_id AND ca.community_article_status = 1';
				foreach($keywordList as $word){
					$sqlWhere .= " AND (ca.community_article_title LIKE ? OR ca.community_article_body LIKE ?)";
					$sqlValues[] = "%{$word}%";
					$sqlValues[] = "%{$word}%";
				}
				$this->listview = array(
					'sql_select'	=> '*',
					'sql_from'	=> 'community as c,community_article as ca',
					'sql_where'	=> $sqlWhere,
					'sql_order'	=> 'ca.community_article_updated_time DESC',
					'sql_values'	=> $sqlValues,
					'sql_num'	=> 10,
				);
			}
		}
	}
}
?>