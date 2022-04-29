<?php
/**
 * Report.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 管理アクセス解析集計画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAccessReport extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		
		//DB取得
		$db = $this->backend->getDB();
		
		//アクセス解析したいページ名
		$access_key = $this->af->get('access_key');
		
		//ページ名称取得。アクセス解析するのは、とりあえずユーザー側のみ。Tv_Action_Userが必ずつくのでとる。
		$short_access_key = str_replace('Tv_Action_User','',$this->af->get('access_key'));
		
		//取得したページ名称を表示用にセット
		$this->af->setApp('short_access_key',$short_access_key);
		
		//Util取得
		$um =& $this->backend->getManager('Util');
		
		//年月日生成、設定
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("m");
		$end_day = $um->getDayCount($year,$month);
		$access_date = sprintf("%04d-%02d",$year,$month);
		
		//指定された日付、ページ名称でのアクセス情報を取得する
		$sql = "select access_id,access_date,access_key,access_num,date_format(access_date,'%e')as access_date_e from access ";
		$sql.= " where access_key = ? AND access_date LIKE ? ORDER BY access_date ASC ";
		$values = array($access_key,$access_date.'%');
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		//取得したアクセス情報access_numを配列化　Array ( [8] => 38 [9] => 94 [10] => 90 ) 
		foreach($rows as $key => $v){
			$i = $v['access_date_e'];
			$res_list[$i] = $v['access_num'];
		}
		
		//指定月の日数分繰り返す
		for($i=1;$i<=$end_day;$i++){
			
			//リスト生成
			$access_list[$i]["access_year"] = $year;
			$access_list[$i]["access_month"] = $month;
			$access_list[$i]["access_day"] = $i;
			$today = sprintf("%04d-%02d-%02d",$year,$month,$i);
			//$access_list[$i]["access_today"] = sprintf("%04d%02d%02d",$year,$month,$i);
			$access_list[$i]["access_date"] = $today;
			
			//指定日付にアクセス情報access_numがあれば代入
			if(!@is_null($res_list[$i])){
				$access_list[$i]["access_num"] = $res_list[$i];
			}
			//指定日付にアクセス情報がaccess_numがない：0代入
			else{
				$access_list[$i]["access_num"] = 0;
			}
		}
		
		//表示用にセット
		$this->af->setApp('access_list',$access_list);
		
		/*
		// 年オプション
		$year_list[""]["name"] = "年";
		for($i=2007;$i<=2007;$i++){
			$year_list[$i]["name"] = $i;
		}
		$this->af->setApp("year_list",$year_list);

		// 月オプション
		$month_list[""]["name"] = "月";
		for($i=1;$i<=12;$i++){
			$month_list[$i]["name"] = $i;
		}
		$this->af->setApp("month_list",$month_list);
		*/
		
		
		//ＤＢデータから一番古い年を取得する（なければ今年）
		//$r = $db->query("select date_format(banner_access_date,'%Y')as most_old from banner_access order by banner_access_date asc limit 1 ");
		$r = $db->query("select date_format(access_date,'%Y')as most_old from access order by access_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//ＤＢデータから一番新しい年を取得する（なければ今年+1）
		$r = $db->query("select date_format(access_date,'%Y')as most_new from access order by access_date desc limit 1 ");
		while($item = $r->fetchRow()){
			$most_new = $item[0];
		}
		if(!$most_new){ $most_old = date('Y')+1; }
		
		
		// 年オプション
		$year_list[""]["name"] = "年";
		//for($i=2007;$i<=2007;$i++){	/*}*/
		for($i=$most_old;$i<=$most_new;$i++){
			$year_list[$i]["name"] = $i;
		}
		$this->af->setApp("year_list",$year_list);

		// 月オプション
		$month_list[""]["name"] = "月";
		for($i=1;$i<=12;$i++){
			$month_list[$i]["name"] = $i;
		}
		$this->af->setApp("month_list",$month_list);
		
		
		
	}
}
?>
