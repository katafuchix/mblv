<?php
class Tv_View_AdminAdDay extends Tv_ViewClass
{
	function preforward()
	{
		$db = $this->backend->getDB();
		// アクセス取得
		$ad_id = $this->af->get('ad_id');
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
		
		$values = array($ad_id,$start_date,$end_date);
		$sql = "SELECT * FROM ad_access WHERE ad_id = ? AND ad_access_date >= ? AND ad_access_date <= ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		for($i=1;$i<=$end_day;$i++){
			$k = false;
			$hit = false;
			$today = sprintf("%04d-%02d-%02d",$year,$month,$i);
			$ad_access_list[$i]["ad_access_date"] = sprintf("%04d-%02d-%02d",$year,$month,$i);
			foreach($rows as $key => $v){
				if($v["ad_access_date"] == $today){
					$k = $key;
					$hit = true;
				}
			}
			
			if($hit){
				$ad_access_list[$i]["ad_view"] = $rows[$k]["ad_view"];
				$ad_access_list[$i]["ad_click"] = $rows[$k]["ad_click"];
				$ad_access_list[$i]["ad_regist"] = $rows[$k]["ad_regist"];
			}else{
				$ad_access_list[$i]["ad_view"] = 0;
				$ad_access_list[$i]["ad_click"] = 0;
				$ad_access_list[$i]["ad_regist"] = 0;
			}
			if($ad_access_list[$i]["ad_view"] == 0){
				$ad_access_list[$i]["ctr"] = 0;
			}else{
				$ad_access_list[$i]["ctr"] = intval($ad_access_list[$i]["ad_click"] / $ad_access_list[$i]["ad_view"] * 100);
			}
			if($ad_access_list[$i]["ad_click"] == 0){
				$ad_access_list[$i]["cvn"] = 0;
			}else{
				$ad_access_list[$i]["cvn"] = intval($ad_access_list[$i]["ad_regist"] / $ad_access_list[$i]["ad_click"] * 100);
			}
		}
		$this->af->setApp('ad_access_list',$ad_access_list);
		
		// クライアント表示
		$values = array($ad_id);
		$sql = "SELECT * FROM ad WHERE ad_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('ad_name',$rows[0]["ad_name"]);
		
		//ＤＢデータから一番古い年を取得する（なければ今年）
		$r = $db->query("select date_format(ad_access_date,'%Y')as most_old from ad_access order by ad_access_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//ＤＢデータから一番新しい年を取得する（なければ今年+1）
		$r = $db->query("select date_format(ad_access_date,'%Y')as most_new from ad_access order by ad_access_date desc limit 1 ");
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
