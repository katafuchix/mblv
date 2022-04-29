<?php
/**
 * Search.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ記事検索画面ビュー
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleSearch extends Tv_ListViewClass
{
	/**
	 *	画面表示前処理
	 *
	 *	@access 	public
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
			
			// 空文字列要素(スペースが連続した場合に生じる)を除去
			foreach($keywordList as $key => $word){
				if($word == ''){
					unset($keywordList[$key]);
				}
			}
			
			if(count($keywordList) > 0){
				// キーワードが存在する場合
				// 検索
				$sqlWhere = 'c.community_status = 1 AND c.community_join_condition <= 2 AND c.community_id = ca.community_id AND ca.community_article_status = 1';
				
				// キーワードによる検索条件
				foreach($keywordList as $word){
					$sqlWhere .= " AND (ca.community_article_title LIKE ? OR ca.community_article_body LIKE ?)";	// 記事のタイトルと本文が検索対象
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