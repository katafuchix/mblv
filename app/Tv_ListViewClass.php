<?php
// vim: foldmethod=marker
/**
 *  Tv_ListViewClass.php
 *
 *  @author     Technovarth
 *  @package    MBLV
 *  @version $Id: app.viewclass.php 323 2006-08-22 15:52:26Z fujimoto $
 */

// {{{ Tv_ListViewClass
/**
 *  viewクラス
 *
 *  @author  {$author}
 *  @package Tv
 *  @access  public
 */
require_once 'Pager/Pager.php';
class Tv_ListViewClass extends Tv_ViewClass
{
	/* @var array ページング処理用のメンバ */
	var $listview = array();
	
	var $rlist	  = array();
	/**
	 * ページング処理用条件生成
	 */
	 function getCondition($condition)
	 {
	 	 // 初期化
	 	 $sqlWhere = "";
	 	 $sqlValues = array();
	 	// 処理
	 	foreach($condition as $key => $value){
	 		// 種別がない場合はイコール扱いで処理
			if(!array_key_exists('type', $value)){
				$type = 'EQ';
			}else{
				$type = $value['type'];
			}
			// カラム省略
			if(!array_key_exists('column', $value)){
				$column = $key;
			}else{
				$column = $value['column'];
			}
		 	// 条件種別を特定
		 	switch($type){
		 		// イコールの場合
		 		case 'EQ':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' = ?';
						$sqlValues[] = $this->af->get($key);
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// ライクの場合
		 		case 'LIKE':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' LIKE ?';
						$sqlValues[] = "%%" . $this->af->get($key) . "%%";
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// 期間の場合
		 		case 'PERIOD':
		 			// 開始
					if($this->af->get($key . '_year_start') != '' && $this->af->get($key . '_month_start') != '' && $this->af->get($key . '_day_start') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_start = sprintf("%04d-%02d-%02d 00:00:00", $this->af->get($key . '_year_start'), $this->af->get($key . '_month_start'), $this->af->get($key . '_day_start'));
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $date_start;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 終了
					if($this->af->get($key . '_year_end') != '' && $this->af->get($key . '_month_end') != '' && $this->af->get($key . '_day_end') != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$date_end = sprintf("%04d-%02d-%02d 23:59:59", $this->af->get($key . '_year_end'),$this->af->get($key . '_month_end'), $this->af->get($key . '_day_end'));
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $date_end;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 開始または終了が有効化されている場合
					if($this->af->get($key . '_active')){
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		/**
		 		 * 範囲の場合
		 		 * @param [キー]_min, [キー]_minに対応するフォーム値を元にSQLを生成
		 		 */
		 		case 'RANGE':
					// 最小
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $this->af->get($key . '_min');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 最大
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $this->af->get($key . '_max');
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 開始または終了が有効化されている場合
					if($this->af->get($key . '_active')){
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// 年齢の場合
				case 'AGE':
					$today = getdate(); // 日付取得
					// 年齢（最小）
					if($this->af->get($key . '_min') != '' && is_numeric($this->af->get($key . '_min'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$um = $this->backend->getManager('Util');
						$start_age = $um->getBirthday($this->af->get($key . '_min'));
						$maxBirthDate = $start_age['over'];
						//$maxBirthDate = sprintf(
						//	"%04d-%02d-%02d",
						//	$today['year'] - $this->af->get($key . '_min'),
						//	$today['mon'],
						//	$today['mday']
						//);
						$sqlWhere .= $column . ' <= ?';
						$sqlValues[] = $maxBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 年齢（最大）
					if($this->af->get($key . '_max') != '' &&  is_numeric($this->af->get($key . '_max'))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$um = $this->backend->getManager('Util');
						$end_age = $um->getBirthday($this->af->get($key . '_max'));
						$minBirthDate = $end_age['under'];
						//$minBirthDate = sprintf(
						//	"%d-%02d-%02d",
						//	$today['year'] - $this->af->get($key . '_max') - 1,
						//	$today['mon'],
						//	$today['mday']
						//);
						$sqlWhere .= $column . ' >= ?';
						$sqlValues[] = $minBirthDate;
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
					}
					// 開始または終了が有効化されている場合
					if($this->af->get($key . '_active')){
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// 正規表現の場合
		 		case 'REGEXP':
					if($this->af->get($key) != ''){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' (' .$column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?)';
						
						$sqlValues[] = $this->af->get($key);
						$sqlValues[] = '^' . $this->af->get($key) . ',';
						$sqlValues[] = ',' . $this->af->get($key) . '$';
						$sqlValues[] = ',' . $this->af->get($key) . ',';
						
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// 複合選択の場合
		 		case 'IN':
		 			// 例え指定の値が一つであろうと配列で指定することが条件
					if(is_array($this->af->get($key))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' ( ';
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
						foreach($this->af->get($key) as $k => $v){
							// 最初の値でない場合
							if($k!=0) $sqlWhere.= ' OR ';
							
							$sqlWhere .= $key . '=?';
							$sqlValues[] = $v;
						}
						if($sqlWhere) $sqlWhere .= ' )';
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 		// 複合正規表現の場合
		 		case 'REGEXP_IN':
		 			// 例え指定の値が一つであろうと配列で指定することが条件
					if(is_array($this->af->get($key))){
						// 結合条件を付与
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= ' ( ';
						// 検索項目を有効化
						$this->af->setApp($key . '_active', true);
						foreach($this->af->get($key) as $k => $v){
							// 最初の値でない場合
							if($k!=0) $sqlWhere.= ' OR ';
							
							$sqlWhere .= $column. '= ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ? OR '.$column.' REGEXP ?';
							$sqlValues[] = $v;
							$sqlValues[] = '^' . $v . ',';
							$sqlValues[] = ',' . $v . '$';
							$sqlValues[] = ',' . $v . ',';
						}
						if($sqlWhere) $sqlWhere .= ' )';
						// 公開設定を有効化
						if(array_key_exists('public', $value)){
							// 結合条件を付与
							if($sqlWhere) $sqlWhere .= ' AND ';
							$sqlWhere .= $column . '_public = ?';
							$sqlValues[] = 1;
						}
					}
		 		break;
		 	}
		}
		return array($sqlWhere, $sqlValues);
	 }
	
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  特殊な画面を表示する場合を除いて特にオーバーライドする必要は無い
	 *  (preforward()のみオーバーライドすれば良い)
	 *
	 *  @access     public
	 */
	function forward()
	{
		// ページング処理
		if(!$this->af->getApp('listview_data')){
			$this->build();
		}
		// サブクラスのforward()
		return parent::forward();
	}
	
	/**
	 * ページング処理
	@param
		array listview
			db_key				dsnの種別
			data_only			SQLの取得データのみ
			sql_select			クエリで指定するselectブロック
			sql_from			クエリで指定するfromブロック
			sql_where			クエリで指定するwhereブロック
			sql_values			クエリで指定するプレース値
			sql_order			クエリで指定するorderブロック
			sql_num			１ページに何件のデータを表示させるか
			action_name			ページングに引き渡すアクション名
		string page				[_REQUEST]現在のページ数
	@return
		string listview_total			[af->setApp]トータル件数
		array listview_data			[af->setApp]表示データ
		string listview_current			[af->setApp]現在表示ページ数
		string listview_last			[af->setApp]最終ページ数
		array listview_links			[af->setAppNE]ページングリンク（PEAR::Pager形式）
	*/
	function build()
	{
		$listview = $this->listview;
		// 実行するのに十分な変数があれば実行
		if(array_key_exists('sql_select', $listview) && array_key_exists('sql_from', $listview)){
			// パラメタを取得する
			// 必須でないパラメタ
			$db_key = "";
			$dataOnly = false;
			$actionName = "";
			$sqlNum = 50;
			$sqlOrder = "";
			$sqlWhere = "";
			$sqlGroup = "";
			$sqlDistinct = "";
			$sqlValues = array();
			if(array_key_exists('db_key', $listview)) $db_key = $listview['db_key'];
			if(array_key_exists('data_only', $listview)) $dataOnly = $listview['data_only'];
			if(array_key_exists('action_name', $listview)) $actionName = $listview['action_name'];
			if(array_key_exists('sql_num', $listview)) $sqlNum = $listview['sql_num'];
			if(array_key_exists('sql_order', $listview)) $sqlOrder = $listview['sql_order'];
			if(array_key_exists('sql_group', $listview)) $sqlGroup = $listview['sql_group'];
			if(array_key_exists('sql_where', $listview)) $sqlWhere = $listview['sql_where'];
			if(array_key_exists('sql_values', $listview)) $sqlValues = $listview['sql_values'];
			if(array_key_exists('sql_distinct', $listview)) $sqlDistinct = $listview['sql_distinct'];
			// 必須のパラメタ
			$sqlSelect		= $listview['sql_select'];
			$sqlFrom		= $listview['sql_from'];
			
			$controller =& $this->backend->getController();
			$db	=& $this->backend->getDB($db_key);
			
			// クエリの生成
			if($sqlDistinct){
				$countQuery = "SELECT count(distinct {$sqlDistinct}) FROM {$sqlFrom}";
			}else{
				$countQuery = "SELECT count(*) FROM {$sqlFrom}";
			}
			$dataQuery = "SELECT {$sqlSelect} FROM {$sqlFrom}";
			if($sqlWhere){
				$countQuery .= " WHERE {$sqlWhere}";
				$dataQuery .= " WHERE {$sqlWhere}";
			}
			// groupブロックの指定
			if($sqlGroup){
				//$countQuery .=  " GROUP by {$sqlGroup}";
				$dataQuery .=  " GROUP by {$sqlGroup}";
			}
			// orderブロックの指定
			if($sqlOrder){
				//$countQuery .=  " ORDER by {$sqlOrder}";
				$dataQuery .=  " ORDER by {$sqlOrder}";
			}
			
			// ページ計算
			$page = 1;
			if(array_key_exists('page', $_REQUEST)) $page = $_REQUEST['page'];
			
			// オフセット計算
			$offset = ($page - 1) * $sqlNum;
			
			// クエリのリミット計算
			// データのみの場合は全権取得
			if(!$dataOnly) $dataQuery .= " LIMIT $offset,$sqlNum";
			
			// ページングで引き継がない値を指定
			$unset_param = array('start', 'page', 'add', 'update', 'delete', 'submit', 'search');
			// ページングで引き継ぐ値を指定
			$param = &$this->af->getArray();
			foreach($param as $k => $v){
				// 配列の場合
				if(is_array($v)){
					foreach($v as $j => $l){
						if($l != ''){
							$extraVars["{$k}[{$j}]"] = urlencode(mb_convert_encoding($l, $GLOBALS['io_enc'], 'EUC-JP'));
						}
					}
				}
				// スカラーの場合
				else{
					if($v != ''){
						if(!in_array($k, $unset_param)) $extraVars[$k] = urlencode(mb_convert_encoding($v, $GLOBALS['io_enc'], 'EUC-JP'));
					}
				}
			}
			
			// アクション名取得
			if($actionName == ''){
				$currentActionName = $controller->getCurrentActionName();
				$extraVars['action_' . $currentActionName] = 'true';
			} else {
				$extraVars['action_' . $actionName] = 'true';
			}
			
			// 表示データを取得
			$pageData = $db->db->getAll($dataQuery, $sqlValues, DB_FETCHMODE_ASSOC);
			//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//foreach($this->backend->db_list as $a)echo($a->db->last_query).'<br />';
//foreach($this->backend->db_list as $a) $um->trace($a->db->last_query);
//print $dataQuery;
//if(Ethna::isError($pageData)) print $pageData->getDebugInfo();
			$um = $this->backend->getManager('Util');
			// データのみの場合は終了
			if($dataOnly){
				$this->af->setApp('listview_data', $pageData);
				return true;
			}
			
			// トータルを取得
			$total = $db->db->getOne($countQuery, $sqlValues);
//foreach($this->backend->db_list as $a)echo($a->db->last_query).'<br />';
//if(Ethna::isError($total)) print $total->getDebugInfo();
			// ページングオプション指定
			if($GLOBALS['type'] == 'admin'){
				$prevImg = '&#171; 前へ';
				$nextImg = '次へ &#187;';
			}else{
				$prevImg = '←(＊)前へ';
				$nextImg = '次へ(＃)→';
			}
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
				'altFirst'					=> '最初のページへ',
				'altPrev'					=> '前のページへ',
				'altNext'					=> '次のページへ',
				'altLast'					=> '最後のページ',
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
			$this->af->setApp('listview_data', $pageData);
			$this->af->setApp('listview_current', $page);
			if($total == 0 || $sqlNum == 0){
				$this->af->setApp('listview_last', 1);
			}else{
				$this->af->setApp('listview_last', @ceil($total / $sqlNum));
			}
			$this->af->setAppNE('listview_links', $links);
			
			// 現在引き継いでいるパラメタからURLを生成する（複数チェックボックスの引き継ぎには対応していないはず）
			// ソート系のパラメタは引き継がない
			$uri = "";
			if(is_array($extraVars)){
				$sort_param = array('sort_key', 'sort_order');
				foreach($extraVars as $k => $v){
					if(in_array($k, $sort_param)) continue;
					if($uri){
						$uri .= "&{$k}={$v}";
					}else{
						$uri .= "?{$k}={$v}";
					}
				}
			}
			$this->af->setApp('listview_uri', $uri);
		}
	}
}
// }}}
?>