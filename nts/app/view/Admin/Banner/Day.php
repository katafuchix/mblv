<?php
/**
 * Day.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ����ײ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerDay extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$db = $this->backend->getDB();
		// ������������
		$banner_id = $this->af->get('banner_id');
		$um =& $this->backend->getManager('Util');
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("m");
		$end_day = $um->getDayCount($year,$month);
		$start_date = sprintf("%04d%02d%02d",$year,$month,"01");
		$end_date = sprintf("%04d%02d%02d",$year,$month,$end_day);

		$values = array($banner_id,$start_date,$end_date);
		$sql = "SELECT * FROM banner_access WHERE banner_id = ? AND banner_access_date >= ? AND banner_access_date <= ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		for($i=1;$i<=$end_day;$i++){
			$k = false;
			$hit = false;
			$today = sprintf("%04d%02d%02d",$year,$month,$i);
			$banner_access_list[$i]["banner_access_date"] = $today;
			foreach($rows as $key => $v){
				if($v["banner_access_date"] == $today){
					$k = $key;
					$hit = true;
				}
			}

			if($hit){
				$banner_access_list[$i]["banner_view"] = $rows[$k]["banner_view"];
				$banner_access_list[$i]["banner_click"] = $rows[$k]["banner_click"];
			}else{
				$banner_access_list[$i]["banner_view"] = 0;
				$banner_access_list[$i]["banner_click"] = 0;
			}
			if($banner_access_list[$i]["banner_view"] == 0){
				$banner_access_list[$i]["cvn"] = 0;
			}else{
				$banner_access_list[$i]["cvn"] = intval($banner_access_list[$i]["banner_click"] / $banner_access_list[$i]["banner_view"] * 100);
			}
		}
		$this->af->setApp('banner_access_list',$banner_access_list);

		// ���饤�����ɽ��
		$values = array($banner_id);
		$sql = "SELECT * FROM banner WHERE banner_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->af->setApp('banner_client',$rows[0]["banner_client"]);
		
		
		//�ģ¥ǡ���������ָŤ�ǯ���������ʤʤ���к�ǯ��
		$r = $db->query("select date_format(banner_access_date,'%Y')as most_old from banner_access order by banner_access_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//�ģ¥ǡ���������ֿ�����ǯ���������ʤʤ���к�ǯ+1��
		$r = $db->query("select date_format(banner_access_date,'%Y')as most_new from banner_access order by banner_access_date desc limit 1 ");
		while($item = $r->fetchRow()){
			$most_new = $item[0];
		}
		if(!$most_new){ $most_old = date('Y')+1; }
		
		
		// ǯ���ץ����
		$year_list[""]["name"] = "ǯ";
		for($i=$most_old;$i<=$most_new;$i++){
			$year_list[$i]["name"] = $i;
		}
		$this->af->setApp("year_list",$year_list);

		// ��ץ����
		$month_list[""]["name"] = "��";
		for($i=1;$i<=12;$i++){
			$month_list[$i]["name"] = $i;
		}
		$this->af->setApp("month_list",$month_list);
	}
}
?>
