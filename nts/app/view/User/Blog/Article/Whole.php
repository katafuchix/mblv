<?php
/**
 * Search.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記全体一覧画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
//class Tv_View_UserBlogArticleWhole extends Tv_ListViewClass
class Tv_View_UserBlogArticleWhole extends Tv_ViewClass
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
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		$um = $this->backend->getManager('Util');
		
		// 今回表示するページでは何件目から表示するのか
		$page = $this->af->get('page') == null ? 1 : $this->af->get('page');
		// １ページ内に表示する件数
		$count = 20;
		$start = 5 + $count * ($page-1);
			
		// ゲストユーザーの日記の場合
		if($this->af->get('guest')){
			
			// ゲストユーザー日記の一覧を取得
			// status: 1 公開のみ
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1 AND b.twitter_status = 0',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
					"sql_num"		=> strval($start .",". $count),
			);
			
		}
		// 全体の日記
		else{
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
			$param = array( 
					"sql_select"	=> "distinct b.blog_article_id , b.blog_article_title, b.blog_article_comment_num, u.user_id, u.user_nickname ",
					"sql_from"		=> "user u, blog_article b ",
					"sql_where"		=> $whereStr,
					"sql_values"	=> array(),
					"sql_order"	=> "b.blog_article_id DESC",
					"sql_num"		=> strval($start .",". $count),
			);
			
		}
		
		$r = $um->dataQuery($param);
		
		$listview_data = array();
		foreach($r as $k=>$v){
			$listview_data[] = $v;
		}
		// このページで表示する分をテンプレートに渡す
		$this->af->setApp('listview_data', $listview_data);
		
		
		// 以下ページングの設定
		$extraVars['action_user_blog_article_whole' ] = 'true';
		// ゲストユーザーの日記の場合
		if($this->af->get('guest')) $extraVars['guest' ] = 'true';
		
		// ページングオプション指定
		if($GLOBALS['type'] == 'admin'){
			$prevImg = '&#171; Previous';
			$nextImg = 'Next &#187;';
		}else{
			$prevImg = '←(＊)前へ';
			$nextImg = '次へ(#)→';
		}
		
		// ゲストユーザーの日記の場合
		if($this->af->get('guest')){
			$param = array(
					'sql_select'	=> 'distinct b.blog_article_id ',
					'sql_from'		=> 'user u, blog_article b',
					'sql_where'		=> 'u.user_id = b.user_id AND b.blog_article_status = 1 AND b.blog_article_public = 1 '
										.' AND u.user_status = 2 AND u.user_guest_status = 1 AND b.twitter_status = 0',
					'sql_values'	=> array(),
					'sql_order'		=> 'b.blog_article_id DESC',
			);
		}
		// 全体の日記の一覧の件数
		else{
			$param = array( 
					"sql_select"	=> "distinct b.blog_article_id ",
					"sql_from"		=> "user u, blog_article b ",
					"sql_where"		=> $whereStr,
					"sql_values"	=> array(),
					"sql_order"	=> "b.blog_article_id DESC",
			);
		}
		$r = $um->dataQuery($param);
		// トータルの件数 max:100
		if(count($r)-5>100){
			$total = 100;
		}else{
			$total = count($r)-5;
		}
		
		// 1ページに表示する件数
		$sqlNum = $count;
		$options = array(
			'delta'						=> 5,
			'totalItems'				=> $total,
			'perPage'					=> $sqlNum,
			'mode'						=> 'Sliding',
			'httpMethod'				=> 'GET',	// POSTにした場合、PEAR::PagerはJavascriptでページングリンクを出力するため注意が必要
			'importQuery'				=> false,
			'extraVars'					=> $extraVars,
			'currentPage'				=> $page,
			'curPageLinkClassName'		=> 'current',
			'expanded'					=> false,
			'urlVar'					=> 'page',
			'prevImg'					=> $prevImg,
			'nextImg'					=> $nextImg,
			'separator'					=> '',
			'spacesBeforeSeparator'		=> 0,
			'spacesAfterSeparator' 		=> 0,
			'clearIfVoid'				=> false,
			'firstPagePre'				=> '',
			'firstPagePost'				=> '',
			'lastPagePre'				=> '',
			'lastPagePost'				=> '',
			'altFirst'					=> 'Go to page 1',
			'altPrev'					=> 'Go to Previous Page',
			'altNext'					=> 'Go to Next Page',
			'altLast'					=> 'Go to Last Page',
			'altPage'					=> 'Go to page',
		);
		// ページング生成
		$pager = Pager::factory($options);
		$links = $pager->getLinks();
		$page_range = $pager->getPageRangeByPageId();
		$page_range = range($page_range[0], $page_range[1]);
		
		// リンクのリライト
		if($links['pages'] != ''){
			// 管理画面の場合
			if($GLOBALS['type'] == 'admin'){
				// 前のページ
				if($links['back'] != ''){
					// クラスを付ける
					$links['back'] = str_replace('<a href', '<a class="nextprev" href', $links['back']);
				}else{
					$links['back'] = '<span class="nextprev">' . $pager->getOption('prevImg') . '</span>';
				}
				// 最初のページ
				if($links['first'] != '' && !in_array(1, $page_range)){
					$links['first'] = $links['first'] . '<span>....</span>';
				}else{
					$links['first'] = '';
				}
				// 最後のページ
				if($links['last'] != '' && !in_array($pager->numPages(), $page_range)){
					$links['last'] = '<span>....</span>' . $links['last'];
				}else{
					$links['last'] = '';
				}
				// 次のページ
				if($links['next'] != ''){
					// クラスを付ける
					$links['next'] = str_replace('<a href', '<a class="nextprev" href', $links['next']);
				}else{
					$links['next'] = '<span class="nextprev">' . $pager->getOption('nextImg') . '</span>';
				}
			}
			// ユーザ画面の場合
			elseif($GLOBALS['type'] == 'user'){
				// 前のページ
				if($links['back'] != ''){
					// アクセスキーを付ける
					$links['back'] = str_replace('<a href', '<a accesskey="*" href', $links['back']);
				}
				// 次のページ
				if($links['next'] != ''){
					// アクセスキーを付ける
					$links['next'] = str_replace('<a href', '<a accesskey="#" href', $links['next']);
				}
			}
		}
		
		// 今回の取得結果をViewに割り当てる
		$this->af->setApp('listview_total', $total);
		//$this->af->setApp('listview_data', $pageData);
		$this->af->setApp('listview_current', $page);
		if($total == 0 || $sqlNum == 0){
			$this->af->setApp('listview_last', 1);
		}else{
			$this->af->setApp('listview_last', @ceil($total / $sqlNum));
		}
		$this->af->setAppNE('listview_links', $links);
	}
}
?>