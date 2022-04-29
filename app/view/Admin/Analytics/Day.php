<?php
class Tv_View_AdminAnalyticsDay extends Tv_ViewClass
{
	function preforward()
	{
		$db = $this->backend->getDB();
		// アクセス取得
		$um =& $this->backend->getManager('Util');
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("n");
		$this->af->set('year', $year);
		$this->af->set('month', $month);
		$end_day = $um->getDayCount($year,$month);
		$start_date = sprintf("%04d-%02d-%02d",$year,$month,"01");
		$end_date = sprintf("%04d-%02d-%02d",$year,$month,$end_day);
		
		$values = array($start_date,$end_date);
		$sql = "SELECT * FROM analytics WHERE analytics_date >= ? AND analytics_date <= ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		for($i=1;$i<=$end_day;$i++){
			$k = false;
			$hit = false;
			$today = sprintf("%04d-%02d-%02d",$year,$month,$i);
			$analytics_list[$i]["analytics_date"] = $today;
			foreach($rows as $key => $v){
				if($v["analytics_date"] == $today){
					$k = $key;
					$hit = true;
				}
			}
			if($hit){
				$analytics_list[$i]["pre_regist_num"] = $rows[$k]["pre_regist_num"];
				$analytics_list[$i]["regist_num"] = $rows[$k]["regist_num"];
				$analytics_list[$i]["friend_num"] = $rows[$k]["friend_num"];
				$analytics_list[$i]["natural_num"] = $rows[$k]["natural_num"];
				$analytics_list[$i]["resign_num"] = $rows[$k]["resign_num"];
			}else{
				$analytics_list[$i]["pre_regist_num"] = 0;
				$analytics_list[$i]["regist_num"] = 0;
				$analytics_list[$i]["friend_num"] = 0;
				$analytics_list[$i]["natural_num"] = 0;
				$analytics_list[$i]["resign_num"] = 0;
			}
		}
		$this->af->setApp('analytics_list',$analytics_list);
	}
}
?>