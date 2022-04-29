<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ記事検索画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleSearch extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// リストビュー
		$sqlValues = array();
		if($this->af->get('keyword') != ''){
			// キーワードが入力されている場合
			// スペース区切りでキーワードを分割
			$keyword = str_replace('　', ' ', $this->af->get('keyword'));
			$keywordList = explode(' ', $keyword);
			
			// 空文字列を削除
			foreach($keywordList as $key => $word){
				if($word == ''){
					unset($keywordList[$key]);
				}
			}
			
			if(!count($keywordList)){
				// キーワードがスペースしか入力されていなかった場合
				
			}else{
				// 検索（条件が複雑なのでSQLにしました）
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