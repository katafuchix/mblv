<?php
/**
 * Twitter.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * トゥイッター書き込み表示画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserTwitter extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		$tm = $this->backend->getManager('Thema');
		$this->af->setApp('thema_title', $tm->getThemaTitle());
		
		
		// お題ID
		if($this->af->get('thema_id'))	$thema_id = $this->af->get('thema_id');
		else							$thema_id = 0;
		
		// Twitter日記の一覧を取得
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
		$whereStr .= ' AND u.user_status = 2 AND b.blog_article_status = 1 AND b.blog_article_public = 1 ';
		//$whereStr .= ' AND b.thema_id = '. $thema_id .' AND twitter_status = 1';
		$whereStr .= ' AND twitter_status = 1';
		
		$this->listview = array(
				'action_name'	=> 'user_twitter',
				'sql_select'	=> 'distinct b.blog_article_id , b.blog_article_title, b.blog_article_body, b.blog_article_comment_num, u.user_id, u.user_nickname, b.blog_article_comment_time ',
				'sql_from'		=> 'user u, blog_article b ',
				'sql_where'		=> $whereStr,
				'sql_values'	=> array(),
				'sql_order'		=> 'b.blog_article_comment_time DESC',
				'sql_num'		=> 20,
				'sql_limit'		=> 200,
		);
		// SQL実行
		$this->build();
		
		$listview_data = $this->af->getApp('listview_data');
		foreach($listview_data as $k=>$v){
			// 長さを8文字までに調整する
			// 絵文字があるためにこうする
			// 長さを変更するValue
			$str = $v[blog_article_title];
			// 文字列の長さ
			$len = 8;
			// 絵文字検索格納用の配列を初期化する
			$match = array();
			// 絵文字を一時置換する文字列
			$_tmp = '#';
			// 書き込みの中に絵文字があれば
			if(preg_match_all( '/\[x:(\d{4})\]/', $str, $match )){
				// 絵文字を正規表現で一時文字列に置換する
				$_replace_str =  preg_replace( '/\[x:(\d{4})\]/', $_tmp, $str );
				// 指定された長さで切り出す
				$_replace_str = mb_substr( $_replace_str, 0, $len);
				// 絵文字を格納した配列のキー
				$j=0;
				// 絵文字を置き換えて最終的な文字列を作成する
				$_str = "";
				// 文字列の分だけ回す
				for($i=0;$i<$len;$i++){
					// 絵文字だったら
					if(mb_substr( $_replace_str, $i, 1) == $_tmp){
						// 絵文字実態に置き換える
						$_str .= $match[0][$j];
						$j++;
					// 通常の文字は
					}else{
						// そのまま
						$_str .= mb_substr( $_replace_str, $i, 1);
					}
				}
				// テンプレートに渡す配列に入れなおす
				$listview_data[$k][blog_article_title] = $_str;
				
			// 絵文字がなければ指定文字数にして配列に入れなおす
			}else{
				$listview_data[$k][blog_article_title] = mb_substr( $str, 0, $len);
			}
		}
		$this->af->setApp('listview_data',$listview_data);
	}
}

?>
