<?php
class Tv_View_AdminMagazineList extends Tv_ViewClass
{
	function preforward()
	{
		$um =& $this->backend->getManager('Util');
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("n");
		$this->af->set('year', $year);
		$this->af->set('month', $month);
		$end_day = $um->getDayCount($year,$month);
		$start_time = sprintf("%04d-%02d-%02d 00:00:00",$year,$month,"01");
		$end_time = sprintf("%04d-%02d-%02d 23:59:59",$year,$month,$end_day);

		// メルマガ配信一覧の取得
		$db = $this->backend->getDB();
		$values = array($start_time,$end_time);
		$sql = "SELECT * FROM magazine " .
		"WHERE magazine_reserve_time >= ? AND magazine_reserve_time <= ? AND magazine_status > 0";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);

		for($i=1;$i<=$end_day;$i++){
			$k = false;
			$hit = false;
			$magazine_list[$i]["magazine_year"] 	= $year;
			$magazine_list[$i]["magazine_month"] 	= $month;
			$magazine_list[$i]["magazine_day"] 		= $i;
			$today = sprintf("%04d年%02d月%02d日",$year,$month,$i);
			$magazine_list[$i]["magazine_today"] 	= sprintf("%04d%02d%02d",$year,$month,$i);
			$magazine_list[$i]["magazine_date"] 	= $today;
			$magazine_list[$i]["magazine_count"] 	= 0;
			foreach($rows as $key => $v){
				if(date("Y年m月d日",strtotime($v["magazine_reserve_time"])) == $today){
					$k[] = $key;
					$hit = true;
				}
			}
			if($hit){
				$magazine_list[$i]["magazine_count"] = count($k);
				$magazine_list[$i]["main"][0]["magazine_top"] = 1;
				foreach($k as $l => $j){
					$magazine_list[$i]["main"][$l]["magazine_id"] 			= $rows[$j]["magazine_id"];
					$magazine_list[$i]["main"][$l]["magazine_status"] 		= $rows[$j]["magazine_status"];
					$magazine_list[$i]["main"][$l]["magazine_title"] 		= $rows[$j]["magazine_title"];
					$magazine_list[$i]["main"][$l]["magazine_reserve_time"]	= $rows[$j]["magazine_reserve_time"];
					$magazine_list[$i]["main"][$l]["magazine_start_time"] 		= $rows[$j]["magazine_start_time"];
					$magazine_list[$i]["main"][$l]["magazine_end_time"] 		= $rows[$j]["magazine_end_time"];
					$magazine_list[$i]["main"][$l]["magazine_sent_num"] 		= $rows[$j]["magazine_sent_num"];
					$magazine_list[$i]["main"][$l]["magazine_error_num"] 		= $rows[$j]["magazine_error_num"];
					$magazine_list[$i]["main"][$l]["magazine_user_num"] 		= $rows[$j]["magazine_user_num"];
				}
			}
		}
		$this->af->setApp('magazine_list',$magazine_list);
		$this->af->setApp('today',date('Ymd'));
		
		
		//ＤＢデータから一番古い年を取得する（なければ今年）
		$r = $db->query("select date_format(magazine_reserve_time,'%Y')as most_old from magazine order by magazine_reserve_time asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//ＤＢデータから一番新しい年を取得する（なければ今年+1）
		$r = $db->query("select date_format(magazine_reserve_time,'%Y')as most_new from magazine order by magazine_reserve_time desc limit 1 ");
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
