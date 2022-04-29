<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ検索画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunitySearch extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// リストビュー
		$sqlWhere = 'c.community_category_id = cc.community_category_id AND c.community_status = 1 AND c.community_join_condition <= 2';
		$sqlValues = array();
		
		// キーワード検索
		if($this->af->get('keyword') != ''){
			// スペース区切りでキーワードを分割
			$keyword = str_replace('　', ' ', $this->af->get('keyword'));
			$keywordList = explode(' ', $keyword);
			
			// 空文字列を削除
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
		
		// カテゴリ指定
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