<?php
/**
 * Day.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理メディア集計画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminMediaDay extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$db = $this->backend->getDB();
		// アクセス取得
		$code = $this->af->get('code');
		$um =& $this->backend->getManager('Util');
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("m");
		$end_day = $um->getDayCount($year,$month);
		$start_date = sprintf("%04d%02d%02d",$year,$month,"01");
		$end_date = sprintf("%04d%02d%02d",$year,$month,$end_day);
		
		$values = array($code,$start_date,$end_date);
		//$sql = "SELECT count_date,status,count FROM media_access_count WHERE code = ? AND count_date >= ? AND count_date <= ?";
		$sql = "SELECT media_access_count_date,media_access_count_status,media_access_count_count FROM media_access_count WHERE media_access_count_code = ? AND media_access_count_date >= ? AND media_access_count_date <= ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (PEAR::isError($rows)){
			// デバッグ情報
			$this->ae->add("errors",$rows->getMessage());
			$this->ae->add("errors",$rows->getDebugInfo());
		}
		
		
		//取得したデータの表示形式を整える
		$list = array();
		foreach($rows as $k => $v){
			$ymd = $v['media_access_count_date'];
			if($v['media_access_count_status'] == 0){
				$list[$ymd]['media_access_count_date'] = $ymd;
				$list[$ymd]['access'] = $v['media_access_count_count'];
			}
			if(array_key_exists($ymd,$list)){
				if($v['media_access_count_status'] == 2){
					$list[$ymd]['register'] = $v['media_access_count_count'];
				}
				elseif($v['media_access_count_status'] == 3){
					$list[$ymd]['return'] = $v['media_access_count_count'];
					@$list[$ymd]['per'] = $list[$ymd]['register'] / $list[$ymd]['access'] * 100;
					//$list[$ymd]['per'] = $list[$ymd]['access'] / $list[$ymd]['register'];
				}
			}
		}
		
		//セット
		$this->af->setApp('list',$list);
		
		//ＤＢデータから一番古い年を取得する（なければ今年）
		//$r = $db->query("select date_format(count_date,'%Y')as most_old from media_access_count order by count_date asc limit 1 ");
		$r = $db->query("select date_format(media_access_count_date,'%Y')as most_old from media_access_count order by media_access_count_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//ＤＢデータから一番新しい年を取得する（なければ今年+1）
		$r = $db->query("select date_format(media_access_count_date,'%Y')as most_old from media_access_count order by media_access_count_date desc limit 1 ");
		while($item = $r->fetchRow()){
			$most_new = $item[0];
		}
		if(!$most_new){ $most_old = date('Y')+1; }
		
		
		// 年オプション
		$year_list[""]["name"] = "年";
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
