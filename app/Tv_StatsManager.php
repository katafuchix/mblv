<?php
/**
 * Tv_Stats.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 統計マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_StatsManager extends Ethna_AppManager
{
	/**
	 * ログをDBにINSERTする
	 * 処理速度向上のため、「テーブルの存在確認」と「ログのINSERT」のみ行う
	 * @param
	 * $type
	 *		access[class_name（省略可）]※個別プロファイルへのサブポスト必須
	 *		blog[user_id]
	 *		blog_article[blog_article_id]※上層プロファイルへのサブポストの必要あり
	 *		community[community_id]
	 *		community_article[community_article]※上層プロファイルへのサブポストの必要あり
	 *		[×cron系]ad[ad_id]
	 *		[×cron系]banner[banner_id]
	 *		[×cron系]media[media_id]
	 *		image[image_id]※当面保留
	 *		movie[movie_id]※当面保留
	 *		avatar[avatar_id]
	 *		decomail[decomail]
	 *		game[game_id]
	 *		sound[sound_id]
	 * $id ID（主にプライマリキーを想定）
	 * $sub_id サブID（主にカテゴリIDを想定）
	 * $status ステータス
	 * @return true/false
	 *	2. ログのインサート
	 */
	function addStats($type='access',$id=0,$sub_id=0,$status=0)
	{
		// 統計設定の取得
		$stats_type = $this->getStatsType();
		
		// [type]別処理を行う
		switch($type)
		{
			// アクセスの場合
			case 'access':
				// [id]クラス名を取得する
				foreach($this->backend->controller->action as $key => $value) {
					$action_name = $this->backend->controller->action[$key]['class_name'];
					break;
				}
				// アクション名が取得できない場合は処理を終了
				if(!$action_name) return false;
				
				// アクセスログのINSERT
				$this->_addStats($type, $action_name);
				
				// サブポストが必要がどうか判別する
				$receive = array(
					'blog'				=> '/Tv_Action_UserBlog*/',
					'blog_article'		=> '/^Tv_Action_UserBlogArticleView/',
					'community'			=> '/^Tv_Action_UserCommunity*/',
					'community_article'	=> '/^Tv_Action_UserCommunityArticleView/',
					'itemview'			=> '/^Tv_Action_Item/',
					'contents'			=> '/Tv_Action_UserContents*/',
				);
				foreach($receive as $k => $v){
					// 条件に該当する場合
					if(preg_match($v, $action_name)){
						// サブポストを行う
						$this->_addStats($k, $this->_getId($k));
					}
				}
				break;
			// その他の場合
			default:
				// ログをINSERTする（[id][sub_id]は変数の初期値を使用する）
				$this->_addStats($type, $id, $sub_id, $status);
				break;
		}
	}
	
	/**
	 * [id]と[name]を対応させるために追加する検索条件
	 * @param type [type]
	 * @param table_name
	 * @param sqlSelect
	 * @param sqlWhere
	 * @return array(table_name, sqlSelect, sqlWhere)
	 */
	function addSqlIdName($type, $table_name, $sqlSelect, $sqlWhere)
	{
		// [type]別の[base]_[ext]を取得する
		list($base, $ext) = $this->_getIdBase($type);
		// テーブルに追加
		$table_name = DB_SNSV_STATS.".{$table_name},".DB_SNSV.".{$base} as base";
		// SELECT句に追加
		if($type=='invite'){
			$sqlSelect[] = "base.{$ext} as name";
		}else{
			$sqlSelect[] = "base.{$base}_{$ext} as name";
		}
		// WHERE句に追加
		if($type=='invite'){
			$sqlWhere[] = "id = base.from_user_id";
		}else{
			$sqlWhere[] = "id = base.{$base}_id";
		}
		
		return array($table_name, $sqlSelect, $sqlWhere);
	}
	
	/**
	 * [type]別の[id]に対応する[base]_[ext]を取得する
	 * @param type [type]
	 * @return array([base], [$ext])
	 */
	function _getIdBase($type)
	{
		// [type]別に処理を分岐する
		switch($type){
			// blogの場合
			case 'blog':
				$base = 'user';
				$ext = 'nickname';
				break;
			// blog_articleの場合
			case 'blog_article':
				$base = 'blog_article';
				$ext = 'title';
				break;
			// communityの場合
			case 'community':
				$base = 'community';
				$ext = 'title';
				break;
			// community_articleの場合
			case 'community_article':
				$base = 'community_article';
				$ext = 'title';
				break;
			// bannerの場合
			case 'banner':
				$base = 'banner';
				$ext = 'body';
				break;
			// imageの場合
			case 'image':
				$base = 'image';
				$ext = 'o';
				break;
			// movieの場合
			case 'movie':
				$base = 'movie';
				$ext = 'o';
				break;
			// contentsの場合
			case 'contents':
				$base = 'contents';
				$ext = 'title';
				break;
			// inviteの場合
			case 'invite':
				$base = 'invite';
				$ext = 'to_user_mailaddress';
				break;
			// その他の場合
			default:
				$base = $type;
				$ext = 'name';
				break;
		}
		return array($base, $ext);
	}
	
	/**
	 * [type]別の[id]に対応する[name]を取得する
	 * @param type [type]
	 * @param id [id]
	 * @return int id
	 */
	function getIdName($type, $id)
	{
		// accessの場合
		if($type == 'access'){
			$alm = $this->backend->getManager('ActionList');
			$al = $alm->getActionList();
			// アクション名を取得する
			if(array_key_exists($id, $al)) return $al[$id];
		}
		// その他の場合
		else{
			// 取得設定がある場合は内部関数を実行
			list($base, $ext) = $this->_getIdBase($type);
			if($base && $id && $ext){
				return $this->_getIdName($base, $id, $ext);
			}
		}
		
		return $id;
	}
	
	/**
	 * （getIdNameの内部関数）[type]別の[id]に対応する[name]を取得する
	 * @param base クラスなどのベースとなる文字列
	 * @param id [id]
	 * @param ext 識別子
	 * @return name [name]
	 */
	function _getIdName($base, $id, $ext)
	{
		// キャメライズ
		$um = $this->backend->getManager('Util');
		$Type = $um->camelize($base);
		$class = "Tv_{$Type}";
		// レコード取得
		$o = new $class($this->backend, "{$base}_id", $id);
		// 有効なレコードな場合
		if($o->isValid()) return $o->get("{$base}_{$ext}");
		
		return $id;
	}
	
	/**
	 * （getIDの内部関数）[type]別の[id]を取得する
	 * @param type [type]
	 * @return int id
	 */
	function _getId($type)
	{
		// [type]別の処理を行う
		switch($type)
		{
			// blogの場合
			case 'blog':
				$id = $this->__getId($type, 'user');
				break;
			// communityの場合
			case 'community':
				$id = $this->__getId($type, 'community');
				break;
			case 'contents':
				$id = $this->__getId($type, 'contents');
				break;
			// その他の場合
			default:
				$id = $_REQUEST["{$type}_id"];
				break;
		}
		
		if($id){
			return $id;
		}else{
			return 0;
		}
	}
	
	/**
	 * （_getIdの内部関数）[type]別の[id]を取得する
	 * @param type [type]
	 * @param base 取得したい[id]のキー
	 * @return int id
	 */
	function __getId($type, $base)
	{
		// [base]_idがあればそれを返却
		if($_REQUEST["{$base}_id"]){
			return $_REQUEST["{$base}_id"];
		}
		// [type]_article_idがあればそれを元にuser_idを返却
		if($_REQUEST["{$type}_article_id"]){
			// キャメライズ
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}Article";
			// レコード取得
			$o = new $class($this->backend, "{$type}_article_id", $_REQUEST["{$type}_article_id"]);
			// 有効なレコードな場合
			if($o->isValid()) return $o->get("{$base}_id");
		}
		// [type]_comment_idがあればそれを元にuser_idを返却
		if($_REQUEST["{$type}_comment_id"]){
			// キャメライズ
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}Comment";
			$c = new $class($this->backend, "{$type}_comment_id", $_REQUEST["{$type}_comment_id"]);
			// 有効なレコードな場合
			if($c->isValid()){
				$class = "Tv_{$Type}Article";
				$a = new $class($this->backend, "{$type}_article_id", $c->get("{$type}_article_id"));
				if($a->isValid()) return $a->get("{$base}_id");
			}
		}
		// contentsの場合はコードで来るので対応するcontents_idを取得して返却する
		if($_REQUEST["code"]){
			// キャメライズ
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}";
			// レコード取得
			$o = new $class($this->backend, "{$type}_code", $_REQUEST["code"]);
			// 有効なレコードな場合
			if($o->isValid()) return $o->get("{$base}_id");
		}
		return 0;
	}
	
	/**
	 * （内部関数）ログをDBにINSERTする
	 * @param type
	 * @param id
	 * @param sub_id
	 * @param status
	 * @return true/false
	 */
	function _addStats($type, $id=0, $sub_id=0, $status=0)
	{
		// [type]がない場合は処理を終了
		if(!$type) return false;
		
		// ログを格納するテーブルを決定
		$table = "stats_{$type}";
		
		// テーブルが存在しなければ処理を終了する
		if(!$this->isTableExists($table)) return false;
		
		// DBに接続する
		$db = $this->backend->getDB('stats');
		// 保存するデータをセットする
		$values = array();
		// [id]がある場合セット
		if($id) $values['id'] = $id;
		// [sub_id]がある場合セット
		if($sub_id) $values['sub_id'] = $sub_id;
		// ユーザIDがある場合セット
		$user = $this->session->get('user');
		if($user['user_id']) $values['user_id'] = $user['user_id'];
		// ステータスがある場合セット
		if($status) $values['status'] = $status;
		// 日時情報のセット
		$values['datetime'] = date('Y-m-d H:i:s');
		// INSERT
		$r = $db->db->autoExecute($table, $values, DB_AUTOQUERY_INSERT);
//foreach($this->backend->db_list as $a)echo($a->db->last_query);
		// エラー制御
//		if(PEAR::isError($r)) print $r->getDebugInfo();
		if(PEAR::isError($r)) return false;
		
		return true;
	}
	
	/**
	 * ログのローテーションを行う
	 */
	function rotateStats($type, $term)
	{
		// 起動する関数名を決定
//		$um = $this->backend->getManager('Util');
//		$Term = $um->camelize($term);
//		$function = "_rotateStats{$Term}";
		$function = "_rotateStats";
		if(!method_exists($this, $function)) return false;
		
		// [type]別に処理を分岐する
		switch($type)
		{
			case 'all':
				$stats_type = $this->getStatsType();
				foreach($stats_type as $k => $v){
					if($k){
						$this->$function($k, $term);
					}
				}
				break;
			default:
				$this->$function($type, $term);
		}
	}
	
	/**
	 * （rotateStatsの内部関数）ログのローテーションを行う
	 */
	function _rotateStats($type, $term)
	{
		/* =============================================
		// テーブルの存在確認と存在しない場合はテーブルを生成する
		 ============================================= */
		// DBに接続する
		$db = & $this->backend->getDB('stats');
		$sql = $this->getCreateTable($type, $term);
		$r = $db->db->query($sql);
		
		/* =============================================
		// 旧テーブルから「SELECT」
		 ============================================= */
		$um =& $this->backend->getManager('Util');
		// 接続先DBを決定
		$db_key = $this->getDbKey($type, $term);
		// 選択カラムを決定
		$sqlSelect = $this->getSqlSelect($type, $term);
		// 選択テーブルを決定
		$sqlFrom = $this->getTableName($type, $term, -1);
		// 検索条件を決定
		list($sqlWhere, $sqlValues) = $this->getSqlCondition($type, $term);
		// 選択グループを決定
		$sqlGroup = $this->getSqlGroup($type, $term);
		$param = array(
			'db_key'		=> $db_key,
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> $sqlFrom,
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_group'		=> $sqlGroup,
		);
		$r = $um->dataQuery($param);
		
//print_r($param);
//foreach($this->backend->db_list as $a)echo($a->db->last_query)."\n";
//if(PEAR::isError($r)){
//	print $r->getDebugInfo();exit;
//}else{
//	print_r($r);
//}
		// 個別に集計処理を必要する場合は行う
		if(in_array($type, array('ad','banner','media','invite','item')) && in_array($term ,array('hour','day'))){
			// 準備
			$sql_score = $this->getSqlScore($type);
			$score_status = $this->getScoreStatus($type);
			$_r = array();
			$__r = array();
			// すべての結果レコードに対して処理を行う
			foreach($r as $k => $v){
				foreach($score_status as $i => $ss){
					// 合致するステータスかどうか判別
					if($v['status'] == $ss){
						// 過去にカウントがある場合
						if($_r[$v['id']][$sql_score[$i]]){
							$_r[$v['id']][$sql_score[$i]] = intval($_r[$v['id']][$sql_score[$i]])+1;
						}
						// 過去にカウントがない場合
						else{
							$_r[$v['id']][$sql_score[$i]] = 1;
						}
						// invite
						//$_r[$v['id']]['sub_id'] = $v['sub_id'];
					}
				}
			}
			// 新たに生成したレコードを整備する
			foreach($_r as $k => $v){
				$t = array('id' => $k);
				if(is_array($v)){
					foreach($v as $k => $v){
						$t[$k] = $v;
					}
				}
				$__r[] = $t;
			}
			$r = $__r;
		}
//print_r($r);
		
		/* =============================================
		// 「SELECT」したデータから「INSERT」用のデータを生成
		 ============================================= */
		$timestamp = date("Y-m-d H:i:s");
		// テーブル名を取得
		$table_name = $this->getTableName($type, $term, 0);
		// INSERT句のKEYを生成
		$insert_keys = "`datetime`, `id`, `sub_id`, `created_time`";
		// INSERTするカラムを生成
		$insert_columns = $this->getSqlScore($type);
		// [type]別[term]別に用意するカラムを合成する
		$insert_column = implode(',', $insert_columns);
		if($insert_column) $insert_keys .= ", {$insert_column}";
		$sql = "INSERT INTO {$table_name} ({$insert_keys}) VALUES ";
		// すべての集計データに対して処理を行う
		list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
		foreach($r as $k => $v){
			// 基本のVALUEを用意
			$value = "'" . $start_time . "', '" . $v['id'] . "', '" . $v['sub_id'] . "', '" . $timestamp ."'";
			// [type]別[term]別に用意するVALUEを合成する
			foreach($insert_columns as $k => $j){
				$value .= ", " . intval($v[$j]);
			}
			// 両者を統合
			$insertValues[] = "({$value})";
		}
		/* =============================================
		// 新テーブルに「INSERT」
		 ============================================= */
		// INSERT用のデータがある場合
		if(is_array($insertValues)){
			$sql .= implode(',', $insertValues) . ";";
			$r = $db->db->query($sql);
//print "\n".$sql."\n";
//if(PEAR::isError($r)) print $r->getDebugInfo();
		}
		
		/* =============================================
		// 「INSERTテーブル」から該当データの「DELETE」を行う
		 ============================================= */
		if($term == 'day'){
			// cron系の[type]の処理は行わない
			if($type == 'media' || $type == 'invite') return true;
			// 削除実行
			$sql = "DELETE from stats_{$type} WHERE datetime >= '" . $start_time . "' AND datetime <= '" . $end_time . "'";
			$r = $db->db->query($sql);
//if(PEAR::isError($r)) print $r->getDebugInfo();
		}
		
		return true;
	}
	
	/**
	 * // [type]別[term]別に検索条件を取得する
	 */
	function getSqlCondition($type, $term)
	{
		// 入会経路の場合
//		if($type == 'media' && in_array($term, array('hour', 'day'))){
//				$sql_score = $this->getSqlScore($type);
//				$sqlWhere = 'access_time >= ? AND access_time <=?';// mail regist send は保留
//				list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
//				$sqlValues[] = $start_time;
//				$sqlValues[] = $end_time;
		// 友達招待の場合
//		}else 
//		if($type == 'invite' && in_array($term, array('hour', 'day'))){
//				$sql_score = $this->getSqlScore($type);
//				$sqlWhere = 'mail_time >= ? AND mail_time <=?';// mail regist send は保留
//				list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
//				$sqlValues[] = $start_time;
//				$sqlValues[] = $end_time;
		// その他の場合
//		}else{
			$sqlWhere = 'datetime >= ? AND datetime <= ?';
			list($start_time, $end_time) = $this->getSqlPeriod($term, $term);
			$sqlValues[] = $start_time;
			$sqlValues[] = $end_time;
//		}
		return array($sqlWhere, $sqlValues);
	}
	
	
	/**
	 * GROUP BYを取得する
	 */
	function getSqlGroup($type, $term)
	{
		if(in_array($type, array('ad','banner','media','invite','item')) && in_array($term, array('hour', 'day'))){
			return '';
		}else{
			return 'id';
		}
//		$stats_type = $this->getStatsType();
//		return $stats_type[$type]['sql_group'];
	}
	
	/**
	 * [score]判別用のステータスを取得する
	 */
	function getScoreStatus($type)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['score_status'])) return array();
		return $stats_type[$type]['score_status'];
	}
	
	/**
	 * [score]用のカラムを取得する
	 */
	function getSqlScore($type)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['sql_score'])) return array();
		return $stats_type[$type]['sql_score'];
	}
	
	/**
	 * ORDER BYを取得する
	 */
	function getSqlOrder($type)
	{
		$stats_type = $this->getStatsType();
		return $stats_type[$type]['sql_order'];
	}
	
	/**
	 * SQL発行時の期間条件を取得する
	 */
	function getSqlPeriod($type, $term)
	{
		$um = $this->backend->getManager('Util');
		$start_time = "";
		$end_time = "";
		// [term]別に処理を分岐する
		switch($term)
		{
			case 'year':
					$timestamp = $um->getPreDate('year',-1);
					$start_time	= date("Y-01-01 00:00:00", $timestamp);
					$end_time	= date("Y-12-31 23:59:59", $timestamp);
					break;
			case 'month':
					$timestamp = $um->getPreDate('month',-1);
					$start_time	= date("Y-m-01 00:00:00", $timestamp);
					$end_time	= date("Y-m-t 23:59:59", $timestamp);
					break;
			case 'day':
					$timestamp = $um->getPreDate('day',-1);
					$start_time	= date("Y-m-d 00:00:00", $timestamp);
					$end_time	= date("Y-m-d 23:59:59", $timestamp);
					break;
			case 'hour':
					$timestamp = $um->getPreDate('hour',-1);
					$start_time	= date("Y-m-d H:00:00", $timestamp);
					$end_time	= date("Y-m-d H:59:59", $timestamp);
					break;
			default:
					break;
		}
		return array($start_time, $end_time);
	}
	
	/**
	 * SQL発行時の選択カラムを取得する
	 */
	function getSqlSelect($type, $term)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['sql_select'][$term])) return ;
		return implode(',', $stats_type[$type]['sql_select'][$term]);
	}
	
	/**
	 * テーブルの存在確認を行う
	 * @param table
	 * @return true/false
	 */
	function isTableExists($table)
	{
		// DBに接続
		$db = $this->backend->getDB('stats');
		
		// クエリーを生成する
		$sql = "SHOW TABLES ";
		$r = $db->db->getAll($sql, null, DB_FETCHMODE_ASSOC);
		$array = explode('/',$this->config->get('dsn_stats'));
		$db_name = $array[count($array)-1];
		
		// テーブルの存在判定を行う
		$flg = false;
		foreach($r as $p){
			if( $p["Tables_in_{$db_name}"] == $table ){
				$flg = true;
				break;
			}
		}
		
		return $flg;
	}
	
	/**
	 * テーブルのCREATE文を生成する
	 * @param type [type]
	 * @param term [term]
	 */
	function getCreateTable($type, $term)
	{
		// テーブル名を取得する
		$table_name = $this->getTableName($type, $term, 0);
		
		// [score]を計測するカラムを生成する
		$stats_type = $this->getStatsType();
		$count_column = $stats_type[$type]['count'];
		// 設定がない場合は処理を終了する
		if(!$count_column) return false;
		$count_columns = "";
		if(is_array($count_column)){
			foreach($count_column as $v){
				$count_columns .= $v .",";
			}
		}
		
		// 「CREATE」文を生成
		if($type == 'access' ){ //|| $type == 'invite'){
			$id_column = "id varchar(255) NOT NULL,";
		}else{
			$id_column = "id int(11) NOT NULL default 0,";
		}
		$sql = 
			"CREATE TABLE IF NOT EXISTS {$table_name} (" .
			"stats_id int(11) NOT NULL auto_increment," .
			$id_column .
			"sub_id int(11) NOT NULL default 0," .
			"datetime datetime NOT NULL," .
			$count_columns .
			"created_time datetime NOT NULL," .
			" PRIMARY KEY  (stats_id)" .
			" ) ENGINE=InnoDB ";
		
		return $sql;
	}
	
	/**
	 * 接続先DBを取得する
	 */
	function getDbKey($type, $term)
	{
		// cron系の場合
//		if($type == 'invite' && in_array($term, array('hour', 'day'))
			//|| $type == 'media' && in_array($term, array('hour', 'day'))
//		){
//			$db_key = '';
//		}else{
			$db_key = 'stats';
//		}
		return $db_key;
	}
	
	/**
	 * テーブルの名を返却する
	 * @param type [type]
	 * @param term [term]
	 * @param decade 指定期間（0:今の時間帯のもの、-1:ひとつ前の時間帯のもの）
	 * @return table
	 */
	function getTableName($type, $term, $decade=0)
	{
		$table_name = "";
		// [type]別に処理を分岐する
		switch($term)
		{
			// 時単位の場合
			case 'hour':
				// 今の時間帯
				if($decade === 0){
					$table_name = sprintf("stats_%s_hour_%s", $type, date("Y_m"));
				}
				// 昔の時間帯
				else{
					// cron系の場合
					//if($type == 'media'){
					//	$table_name = "{$type}_access";
					//}else 
					//if($type == 'invite'){
					//	$table_name = "invite";
					//}else{
						$table_name = "stats_{$type}";
					//}
				}
				break;
			// 日単位の場合
			case 'day':
				// 今の時間帯
				if($decade === 0){
					$table_name = sprintf("stats_%s_day_%s", $type, date("Y"));
				}
				// 昔の時間帯
				else{
					// cron系の場合
					//if($type == 'media'){
					//	$table_name = "{$type}_access";
					//}else 
					//if($type == 'invite'){
					//	$table_name = "invite";
					//}else{
						$table_name = "stats_{$type}";
					//}
				}
				break;
			// 週単位の場合（特殊）
			case 'week':
				// 現在が1月ならば昔のデータは前年のテーブルに存在し、今年のデータが今年のテーブルに存在する可能性がある
				$year = date("Y");
				$um = $this->backend->getManager('Util');
				$table_name = sprintf("stats_%s_day_%s", $type, $year);
				if(intval(date("m")) == 1){
					$um = $this->backend->getManager('Util');
					$_table_name = sprintf("stats_%s_day_%s", $type, $um->getPreDate('year', -1));
					return array($table_name, $_table_name);
				}else{
					return $table_name;
				}
				break;
			// 月単位の場合
			case 'month':
				// 今の時間帯
				if($decade === 0){
					$table_name = "stats_{$type}_month";
				}
				// 昔の時間帯
				else{
					// 現在が1月ならば昔のデータは前年のテーブルに存在する
					if(intval(date("m")) == 1){
						$um = $this->backend->getManager('Util');
						$table_name = sprintf("stats_%s_day_%s", $type, date("Y", $um->getPreDate('year', $decade)));
					}
					// その他の場合は今年のテーブルに存在する
					else{
						$table_name = sprintf("stats_%s_day_%s", $type, date("Y"));
					}
				}
				break;
			// 年単位の場合
			case 'year':
				// 今の時間帯
				if($decade === 0){
					$table_name = "stats_{$type}_year";
				}
				// 昔の時間帯
				else{
					$table_name = "stats_{$type}_month";
				}
				break;
			// その他の場合
			default:
					break;
		}
		return $table_name;
	
	}
	
	/*
	 * 統計設定を生成する
	 *
	 */
	function getStatsType()
	{
		// 統計設定
		$stats_type = array(
			/* =============================================
			// 1. access
			 ============================================= */
			'access' => array(
				'name'	=> 'アクセス',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view', 'uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			
			/* =============================================
			// 2. blog
			 ============================================= */
			'blog' => array(
				'name'	=> 'ユーザ日記',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 3. blog_article
			 ============================================= */
			'blog_article'	=> array(
				'name'	=> '日記',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 4. community
			 ============================================= */
			'community'	=> array(
				'name'	=> 'コミュニティ',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 5. community_article
			 ============================================= */
			'community_article'	=> array(
				'name'	=> 'コミュニティトピック',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 6. ad
			 ============================================= */
			'ad'	=> array(
				'name'	=> '広告',
				'count'	=> array(
					'view int(11) NOT NULL default 0',
					'click int(11) NOT NULL default 0',
					'regist int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','click','regist'),
				'score_status'	=> array(1,2,3),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status',
				  	),
					'month' => array(
							'id',
							'view',
							'click',
							'regist',
				  	),
					'year' => array(
							'id',
							'view',
							'click',
							'regist',
				  	),
				 ),
			),
			/* =============================================
			// 7. banner
			 ============================================= */
			'banner'	=> array(
				'name'	=> 'バナー',
				'count'	=> array(
					'view int(11) NOT NULL default 0',
					'click int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','click'),
				'score_status'	=> array(1,2),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status',
				  	),
					'month' => array(
							'id',
							'view',
							'click',
				  	),
					'year' => array(
							'id',
							'view',
							'click',
				  	),
				 ),
			),
			/* =============================================
			// 8. media
			 ============================================= */
			'media'	=> array(
				'name'	=> '入会経路',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'mail int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
						'send int(11) NOT NULL default 0',
						'resign int(11) NOT NULL default 0',
						'buy int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access','mail','regist','send','resign','buy'),
				'score_status'	=> array(0,1,2,3,4,5),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status', 
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'access',
							'mail',
							'regist',
							'send',
							'resign',
							'buy',
				  	),
					'year' => array(
							'id',
							'access',
							'mail',
							'regist',
							'send',
							'resign',
							'buy',
				  	),
				 ),
			),
			/* =============================================
			// 9. avatar
			 ============================================= */
			'avatar'	=> array(
				'name'	=> 'アバター',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 10. decomail
			 ============================================= */
			'decomail'	=> array(
				'name'	=> 'デコメール',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'sub_id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'sub_id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'sub_id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'sub_id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 11. game
			 ============================================= */
			'game'	=> array(
				'name'	=> 'ゲーム',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 12. sound
			 ============================================= */
			'sound'	=> array(
				'name'	=> 'サウンド',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 13. image
			 ============================================= */
			'image'	=> array(
				'name'	=> '画像',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 14. movie
			 ============================================= */
			'movie'	=> array(
				'name'	=> '動画',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 15. contents
			 ============================================= */
			'contents'	=> array(
				'name'	=> 'フリーページ',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 16. invite
			 ============================================= */
			 /*
			'invite'	=> array(
				'name'	=> '友達紹介',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'mail int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access','mail','regist'),
				'score_status'	=> array(0,1,2),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'to_user_mailaddress as id',
							'from_user_id as sub_id',
							'invite_status  as status', 
				  	),
					'day' => array(
							'to_user_mailaddress as id',
							'from_user_id as sub_id',
							'invite_status  as status', 
				  	),
					'month' => array(
							'id',
							'sub_id',
							'access',
							'mail',
							'regist',
				  	),
					'year' => array(
							'id',
							'sub_id',
							'access',
							'mail',
							'regist',
				  	),
				 ),
			),
			*/
			/* =============================================
			// 18. invite
			 ============================================= */
			'invite'	=> array(
				'name'	=> '友達招待',
				'count'	=> array(
						'mail int(11) NOT NULL default 0',
						'access int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
				),
				// idには友達招待を行ったユーザーのuser_idを格納する
				'sql_score'		=> array('mail','access','regist'),
				'score_status'	=> array(0,1,2),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status', 
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'mail',
							'access',
							'regist',
				  	),
					'year' => array(
							'id',
							'mail',
							'access',
							'regist',
				  	),
				 ),
			),
			/* =============================================
			// 17. item
			 ============================================= */
/*
			'item'	=> array(
				'name'	=> '商品',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
*/
			/* =============================================
			// 17. item
			 ============================================= */
			'item'	=> array(
				'name'	=> '商品',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'buy int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access', 'buy'),
				'score_status'	=> array(0, 1),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'access',
							'buy',
				  	),
					'year' => array(
							'id',
							'access',
							'buy',
				  	),
				 ),
			),
		);
		return $stats_type;
	}
}
?>