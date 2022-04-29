<?php
/**
 * Search.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ日記検索画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogArticleSearch extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
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
				// 検索
				// 公開範囲を検索結果に反映
//				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public_status = 1';
				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public=1';	// 結果に友達まで公開の記事を含めるなら要検討
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