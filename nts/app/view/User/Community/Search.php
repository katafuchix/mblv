<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����ߥ�˥ƥ��������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunitySearch extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ꥹ�ȥӥ塼
		$sqlWhere = 'c.community_category_id = cc.community_category_id AND c.community_status = 1 AND c.community_join_condition <= 2';
		$sqlValues = array();
		
		// ������ɸ���
		if($this->af->get('keyword') != ''){
			// ���ڡ������ڤ�ǥ�����ɤ�ʬ��
			$keyword = str_replace('��', ' ', $this->af->get('keyword'));
			$keywordList = explode(' ', $keyword);
			
			// ��ʸ�������
			foreach($keywordList as $key => $word){
				if($word == ''){
					unset($keywordList[$key]);
				}
			}
			
			if(count($keywordList)){
				foreach($keywordList as $word){
					$sqlWhere .= " AND (c.community_title LIKE ? OR c.community_description LIKE ?)";
					$sqlValues[] = "%{$word}%";
					$sqlValues[] = "%{$word}%";
				}
			}
		}
		
		// ���ƥ������
		if($this->af->get('community_category_id')) {
			$sqlWhere .= ' AND c.community_category_id = ?';
			$sqlValues[] = $this->af->get('community_category_id');
		}
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'community as c, community_category as cc',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'c.community_member_num DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'	=> 5,
		);
	}
}
?>