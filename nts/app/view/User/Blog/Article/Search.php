<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記検索画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogArticleSearch extends Tv_ListViewClass
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
				// 検索
				// 公開範囲を検索結果に反映
//				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public_status = 1';
				$sqlWhere = 'u.user_status = 2 AND u.user_id = ba.user_id AND ba.blog_article_status = 1 AND ba.blog_article_public=1 AND twitter_status = 0';	// 結果に友達まで公開の記事を含めるなら要検討
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
		// 日記検索のページ下部＝＞全体ユーザの最新日記5件を表示
		else{
				// セッションからユーザ情報を取得する
				$user = $this->session->get('user');
				
				$um = $this->backend->getManager('Util');
				
				// 全体の日記の一覧を取得
				$whereArray = array();
				$bl_id_array = array();
				// ブラックリストを考慮
				// 自分がブラックリストに登録しているユーザーがあるか
				$param = array(
						//'sql_select'	=> 'black_list_id',
						'sql_select'	=> 'bl.black_list_user_id as bl_user_id',
						'sql_from'		=> 'user u, black_list bl',
						'sql_where'		=> 'bl.black_list_deny_user_id = ? AND u.user_id = bl.black_list_user_id AND bl.black_list_status= 1 AND user_status = 2',
						'sql_values'	=> array($user['user_id']),
				);
				$r = $um->dataQuery($param); 
				// あればSQLで見に行かない
				if(count($r)>0){
					foreach($r as $k=>$v){
						$bl_id_array[] = $v['bl_user_id'];
					}
				}
				
				
				// 自分がブラックリストに登録されているユーザーがあるか
				$param = array(
						//'sql_select'	=> 'black_list_id',
						'sql_select'	=> 'bl.black_list_deny_user_id as bl_user_id',
						'sql_from'		=> 'user u, black_list bl',
						'sql_where'		=> 'u.user_id = bl.black_list_deny_user_id AND bl.black_list_user_id = ? AND bl.black_list_status= 1 AND user_status = 2',
						'sql_values'	=> array($user['user_id']),
				);
				$r = $um->dataQuery($param); 
				// あればSQLで見に行かない
				if(count($r)>0){
					foreach($r as $k=>$v){
						$bl_id_array[] = $v['bl_user_id'];
					}
				}
				
				$whereStr = ' u.user_id = b.user_id ';
				if(count($bl_id_array)){
					$whereStr .= ' AND u.user_id not in ('.implode(',',$bl_id_array).')';
				}
				$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 AND b.twitter_status = 0';
				
				// 全体の日記の一覧を取得
				$this->listview = array(
						'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
						'sql_from'		=> 'user u, blog_article b ',
						'sql_where'		=> $whereStr,
						'sql_values'	=> array(),
						'sql_order'		=> 'b.blog_article_id DESC',
						'sql_num'		=> 5,
				);
		}
	}
}
?>