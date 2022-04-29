<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アクセスログ一覧ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminStatsList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		/*
		 * 初期化
		 */
		$sqlWhere		= array();
		$sqlValues	 	= array();
		$sm = & $this->backend->getManager('Stats');
		$um =& $this->backend->getManager('Util');
		$am =& $this->backend->getManager('ActionList');
		
		// action名と画面名の配列
		$acList =  $am->getActionList();
		
		/*
		 * パラメタを受け取る
		 */
		// [type]
		$type   = $this->af->get('type');
		// 指定がない時はアクセス解析
		if($type=='') $type='access';
		// [type]指定別に[score]リストを取得する
		$this->stats_type = $sm->getStatsType();
		$this->score_keys = $this->stats_type[$type]['sql_score'];
		if(!is_array($this->score_keys)) $this->score_keys = array();
		
		// [term]
		$term	= $this->af->get('term');
		// [id]
		$id		= $this->af->get('id');
		// 年指定
		$year 	= intval($this->af->get('year'));
		// 月指定
		$month 	= intval($this->af->get('month'));
		// 週指定
		$weekno	= intval($this->af->get('weekno'));
		// 日指定
		$day	= intval($this->af->get('day'));
		
		// end
		// 年指定
		$year_end 	= intval($this->af->get('year_end'));
		// 月指定
		$month_end 	= intval($this->af->get('month_end'));
		// 週指定
		$weekno_end	= intval($this->af->get('weekno_end'));
		// 日指定
		$day_end	= intval($this->af->get('day_end'));
		
		// アクセスの時はエンコードされた画面名で来るので変換する
		if($type=='access' && $id){
			
			// 画面名をキーとしてアクション名の配列を作る
			$nameList = array_flip($acList);
			
			// Ethna内部の文字コード変換でリンクから来た場合がうまくいかないのでこうする
			// POSTで来た場合は文字コードの変換必要なし
			if(array_key_exists($id,$nameList)){
				$id = $nameList[$id];
				$this->af->set('id',$this->af->get('id'));
			}
			// GETで来た場合はデコード
			else{
				$id = $nameList[urldecode($_REQUEST['id'])];
				$this->af->set('id',urldecode($_REQUEST['id']));
			}
		
		}
		
		/*
		 * 集計期間を決定する
		 */
		if($term == '')		$term = 'all';
		// 年集計の場合
		if($year != '')		$term = 'year';
		// 月集計の場合
		if($month != '')	$term = 'month';
		// 週集計の場合
		if($weekno != '')	$term = 'week';
		// 日集計の場合
		if($day != '')		$term = 'day';
		// [term]をテンプレートに引き渡す
		$this->af->set('term', $term);
		
		/*
		 * 時間情報を決定
		 */
		// 年情報がない場合は現在年を設定
		if($term != "all" && $year == ""){
			$year = date("Y");
		}
		$this->af->set('year', $year);
		// 月情報がない場合は現在月を設定
		// 累計、年集計の場合は現在年を採用しない
		if(!in_array($term,array('all','year')) && $month == ""){
			$month = intval(date("m"));
		}
		$this->af->set('month', $month);
		// 週情報がない場合は存在しない
		$this->af->set('weekno', $weekno);
		// 日情報がない場合は存在しない
		$this->af->set('day', $day);
		
		// [term]別に処理を分岐
		switch ($term) {
			// 年単位
			case 'year':
				// テーブルの決定
				$table_name = "stats_{$type}_month";
				// 検索条件を生成
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-01-01 00:00:00", $year);
				if($year_end){
					$sqlValues[] = sprintf("%04d-12-31 23:59:59", $year_end);
				}else{
					$sqlValues[] = sprintf("%04d-12-31 23:59:59", $year);
					$this->af->set('year_end',$year);
					$year_end = $year;
				}
				// 表示用日時データを生成
				$this->af->set('date', sprintf("%04d年", $year));
				$this->af->set('date_end', sprintf("%04d年", $year_end));
				break;
			// 月単位
			case 'month':
				// テーブルの決定
				$table_name = "stats_{$type}_day_{$year}";
				// 指定年月の月末日を取得する
				$end_day = $um->getDayCount($year, $month);
				if(!$year_end){
					$year_end = $year;
				}
				if(!$month_end){
					$month_end = $month;
				}
				// 検索条件を生成
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-01 00:00:00", $year, $month);
				//$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year, $month, $end_day);
				$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year_end, $month_end, $end_day);
				// 表示用日時データを生成
				$this->af->set('date', sprintf("%04d年%02d月", $year, $month));
				$this->af->set('year_end',	$year_end);
				$this->af->set('month_end',	$month_end);
				$this->af->set('date_end', sprintf("%04d年%02d月", $year_end, $month_end));
				break;
			// 週単位
			case 'week':
				// テーブルの決定
				$table_name = "stats_{$type}_day_{$year}";
				// 指定年月週の開始日と終了日を取得する
				list($start_day, $end_day) = Tv_UtilManager::getDayOfWeekRange($year, $month, $weekno);
				if(!$year_end){
					$year_end = $year;
				}
				if(!$month_end){
					$month_end = $month;
				}
				// 検索条件を生成
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $start_day);
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year_end, $month_end, $end_day);
				// 表示用日時データを生成
				$this->af->set('date', sprintf("%04d年%02d月第%d週", $year, $month, $weekno));
				$this->af->set('year_end',	$year_end);
				$this->af->set('month_end',	$month_end);
				$this->af->set('date_end', sprintf("%04d年%02d月第%d週", $year_end, $month_end, $weekno));
				break;
			// 日単位
			case 'day':
				// テーブルの決定
				$table_name = sprintf("stats_{$type}_hour_{$year}_%02d", $month);
				if(!$year_end){
					$year_end = $year;
				}
				if(!$month_end){
					$month_end = $month;
				}
				if(!$day_end){
					// 開始日がある場合は当日集計
					if($day){
						$day_end = $day;
					}
					// 指定年月の月末日を取得する
					else{
						$day_end = $um->getDayCount($year_end, $month_end);
					}
				}
				// 検索条件を生成
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $day);
				$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year_end, $month_end, $day_end);
				// 表示用日時データを生成
				$this->af->set('date', sprintf("%04d年%02d月%02d日", $year, $month, $day));
				$this->af->set('year_end',	$year_end);
				$this->af->set('month_end',	$month_end);
				$this->af->set('day_end',	$day_end);
				$this->af->set('date_end', sprintf("%04d年%02d月%02d日", $year_end, $month_end, $day_end));
				break;
			// その他
			default:
				// テーブルの決定
				$table_name = "stats_{$type}_year";
				// 表示用日時データを生成
				$this->af->set('date', "累計");
				break;
		}
		
		// 取得するデータのidが指定されている場合
		if($id != '') {
			// [id]に対応する[name]を取得する
			$name = $sm->getIdName($type, $id);
			$this->af->setApp('name', $name);
		}
		// テーブルが存在しない場合はSQLを実行しない
		if($sm->isTableExists($table_name)){
			// 取得するデータのidが指定されている場合
			if($id != '') {
				// SQL文を構成
				$sqlSelect[] = 'id';
				$sqlSelect[] = 'datetime';
				foreach($sm->getSqlScore($type) as $v){
					$sqlSelect[] = "{$v}";
				}
				$sqlWhere[] = "id = ?";
				$sqlValues[] = $id;
			}else{
				// SQL文を構成
				if($type=='access'){
					$alm = $this->backend->getManager('ActionList');
					$this->af->setApp('al', $alm->getActionList());
				}else{
					// 検索条件に追加
					list($table_name, $sqlSelect, $sqlWhere) = $sm->addSqlIdName($type, $table_name, $sqlSelect, $sqlWhere);
				}
				$sqlSelect[] = 'id';
				foreach($sm->getSqlScore($type) as $v){
					$sqlSelect[] = "SUM({$v}) AS {$v}";
				}
			}
			$selectStr = implode(',',$sqlSelect);
			$whereStr = implode(' AND ',$sqlWhere);
			// 並び順に指定がある場合
			if($this->af->get('score_key')){
				$sqlOrder = "{$this->af->get('score_key')} DESC";
			}
			// 並び順に指定がない場合
			else{
				$sqlOrder = $sm->getSqlOrder($type);
			}
			$param = array(
				'db_key'		=> 'stats',
				'action_name'	=> 'admin_stats_list',
				'sql_select'	=> $selectStr,
				'sql_from'		=> $table_name,
				'sql_where'		=> $whereStr,
				'sql_order'		=> $sqlOrder,
				'sql_values'	=> $sqlValues,
				'sql_distinct'  => 'id',
			);
			
			// 取得するデータのidが指定されている場合
			if($id != '') {
				$listview_data = $um->dataQuery($param);
			}
			// ランキングの場合
			else{
				// listviewを実行
				$param['sql_group'] = 'id';
				// ダウンロードの場合
				if($this->af->get('download')){
					// 全件取得する
					$param['data_only'] = true;
				}
				$this->listview = $param;
				$this->build();
				$listview_data = $this->af->getApp('listview_data');
			}
		}
//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//print_r($param);
//print_r($listview_data);
		// データを整形する
		if(!is_array($listview_data)) $listview_data = array();
		$param = array(
			'type'		=> $type,
			'id'		=> $id,
			'term'		=> $term,
			'year'		=> $year,
			'month'		=> $month,
			'weekno'	=> $weekno,
			'day'		=> $day,
			'start_day'	=> $start_day,
			'end_day'	=> $end_day,
		);
		list($listview_data, $total) = $this->_calcList($listview_data, $param);
		
		//print_r($listview_data);
		//print_r($total);
		
		// アクセスの場合はDBから取ってきたaction名を画面名に変換する
		if($type=='access'){
			foreach($listview_data as $k => $v){
				$listview_data[$k]['id'] = $acList[$v['id']];
			}
		}
		// テンプレートに引き渡す
		$this->af->setApp('listview_data', $listview_data);
		$this->af->setApp('total', $total);
		$this->af->setApp('score_keys', $this->score_keys);
	}
	
	// 累計データ表示計算
	function _calcListAll($listview_data, $param)
	{
		// すべての表示用レコードに対して処理を行う
		foreach($listview_data as $k => $v){
			// 時刻データをセットする
			$listview_data[$k]["stats_date"] = $v["datetime"];
		}
		return $listview_data;
	}
	
	// 年データ表示計算
	function _calcListYear($listview_data, $param)
	{
		// 変数の準備
		$year = $param['year'];
		$stats_list=array();
		// すべての月に対して処理を行う
		for($i=1;$i<=12;$i++){
			// 月単位に変数を初期化
			$k = false;
			$hit = false;
			// 現在の月を生成
			$thismonth = sprintf("%04d-%02d-01 00:00:00",$year,$i);
			// 表示用の月データを生成
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-01",$year,$i);
			// すべての表示用レコードに対して確認を行う
			foreach($listview_data as $key => $v){
				// 現在月と表示用レコードに合致するものがあれば以下の処理を行う
				if($v["datetime"] == $thismonth){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// 該当レコードがあった場合
			if($hit){
				// [score]の算出
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]の初期化
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// 月データ表示計算
	function _calcListMonth($listview_data, $param)
	{
		// 変数の準備
		$year = $param['year'];
		$month = $param['month'];
		$end_day = $param['end_day'];
		$stats_list=array();
		// すべての日に対して処理を行う
		for($i=1;$i<=$end_day;$i++){
			// 日単位に変数を初期化
			$k = false;
			$hit = false;
			// 現在の日を生成
			$today = sprintf("%04d-%02d-%02d 00:00:00",$year,$month,$i);
			// 表示用の日データを生成
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d",$year,$month,$i);
			// すべての表示用レコードに対して確認を行う
			foreach($listview_data as $key => $v){
				// 現在月と表示用レコードに合致するものがあれば以下の処理を行う
				if($v["datetime"] == $today){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// 該当レコードがあった場合
			if($hit){
				// [score]の算出
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]の初期化
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// 週データ表示計算
	function _calcListWeek($listview_data, $param)
	{
		// 変数の準備
		$year = $param['year'];
		$month = $param['month'];
		$start_day = $param['start_day'];
		$end_day = $param['end_day'];
		$stats_list=array();
		// すべての日に対して処理を行う
		for($i=$start_day;$i<=$end_day;$i++){
			// 日単位に変数を初期化
			$k = false;
			$hit = false;
			// 現在の日を生成
			$today = sprintf("%04d-%02d-%02d 00:00:00",$year,$month,$i);
			// 表示用の日データを生成
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d",$year,$month,$i);
			// すべての表示用レコードに対して確認を行う
			foreach($listview_data as $key => $v){
				// 現在月と表示用レコードに合致するものがあれば以下の処理を行う
				if($v["datetime"] == $today){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// 該当レコードがあった場合
			if($hit){
				// [score]の算出
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]の初期化
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// 日データ表示計算
	function _calcListDay($listview_data, $param)
	{
		// 変数の準備
		$year = $param['year'];
		$month = $param['month'];
		$day = $param['day'];
		$stats_list=array();
		// すべての時に対して処理を行う
		for($i=0;$i<=23;$i++){
			// 時単位に変数を初期化
			$k = false;
			$hit = false;
			// 現在の時刻を生成
			$thishour = sprintf("%04d-%02d-%02d %02d:00:00",$year,$month,$day,$i);
			// 表示用の時刻データを生成
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d %02d:00:00",$year,$month,$day,$i);
			// すべての表示用レコードに対して確認を行う
			foreach($listview_data as $key => $v){
				// 現在月と表示用レコードに合致するものがあれば以下の処理を行う
				if($v["datetime"] == $thishour){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// 該当レコードがあった場合
			if($hit){
				// [score]の算出
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]の初期化
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// グラフの計算を行う
	function _calcList($listview_data, $param)
	{
//		print_r($listview_data);
		// 提携シート表示の場合
		if($param['id']){
			switch($param['term'])
			{
				case 'year':
					$listview_data = $this->_calcListYear($listview_data, $param);
					break;
				case 'month':
					$listview_data = $this->_calcListMonth($listview_data, $param);
					break;
				case 'week':
					$listview_data = $this->_calcListWeek($listview_data, $param);
					break;
				case 'day':
					$listview_data = $this->_calcListDay($listview_data, $param);
					break;
				default;
					$listview_data = $this->_calcListAll($listview_data, $param);
					break;
			}
		}
//		print_r($listview_data);
		
		// 初期化
		foreach($this->score_keys as $sk){
			$total[$sk] = 0;
		}
		
		// 新規のlistview_data
		$listview_data_new = array();
		
		// 各データの合計を計算する
		foreach($listview_data as $k => $v){
			foreach($this->score_keys as $sk){
				$total[$sk] = $this->_addTotal($v,$sk,$total[$sk]);
			}
		}
		
		/*
		// 各データのトータル最大値をバーのベースにする場合の処理
		// 最大の値を求めそれを基準にバーの長さ比率を計算する
		$total_array = array();
		foreach($this->score_keys as $sk){
			$total_array[] = $total[$sk];
		}
		$total_max = max($total_array);
		*/
		
		// 各データの最大値MAXをバーのベースにする場合の処理
		// 各データをscore_keyをキーにして配列に格納する
		$k_array = array();
		foreach($listview_data as $k => $v){
			foreach($this->score_keys as $sk){
				$k_array[$sk][] = $v[$sk];
			}
		}
		// 各データでの最大値を配列にする
		$max_array = array();
		if (count($k_array) == 0) {
			$total_max = 1;
		} else {
			foreach($this->score_keys as $sk){
				$max_array[$sk] = max($k_array[$sk]);
			}
			// 各データ最大値配列の中での最大値をバー比較のベースにする
			$total_max = max($max_array);
		}
		
		
		// 画像の長さを出すときのデータを用意する
		foreach($listview_data as $k => $v){
			foreach($this->score_keys as $sk){
				//$v["{$sk}_each"] = $this->_calcData( $v, $sk ,$total_max );
				$v["{$sk}_each"] = $this->_calcData( $v, $sk ,$max_array[$sk] );
				//echo $max_array[$sk]."<br>";
				
				
			}
			$listview_data_new[] = $v;
		}
		//print_r(array($listview_data_new, $total));
		return array($listview_data_new, $total);
	}
	
	// 合計値に加算する
	function _addTotal($array,$key,$total)
	{
		if(array_key_exists($key,$array)){
			$total += $array[$key];
		}
		return $total;
	}
	
	// バーの長さの比率を算出する
	function _calcData($array,$key,$total)
	{
		if(array_key_exists($key,$array) && $total){
			return round( $array[$key]/$total * 100 );
		}
		return 0;
	}
	
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  @access public
	 */
	function forward()
	{
		// ダウンロードの場合
		if($this->af->get('download')){
			// ファイル名の決定
			$file_name = date('Ymd_His') . ".csv";
			// ファイル名ヘッダ出力
			header("Content-Disposition: inline ; filename={$file_name}" );
			// MIMEタイプヘッダ出力
			header("Content-type: text/octet-stream");
			// レンダラオブジェクトを取得
			$renderer =& $this->_getRenderer();
			// デフォルトマクロを実行
			$this->_setDefault($renderer);
			// HTMLを取得
			$html = $renderer->engine->fetch('admin/csv/stats.tpl');
			// サイズヘッダ出力
			header("Content-Length: ". strlen($html));
			// 文字コードを変換して出力
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
			// 終了
			exit;
		}
		// その他の場合
		else{
			parent::forward();
		}
	}
}
?>