<?php
/**
 * Day.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ������ǥ������ײ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminMediaDay extends Tv_ViewClass
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
			// �ǥХå�����
			$this->ae->add("errors",$rows->getMessage());
			$this->ae->add("errors",$rows->getDebugInfo());
		}
		
		
		//���������ǡ�����ɽ��������������
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
		
		//���å�
		$this->af->setApp('list',$list);
		
		//�ģ¥ǡ���������ָŤ�ǯ���������ʤʤ���к�ǯ��
		//$r = $db->query("select date_format(count_date,'%Y')as most_old from media_access_count order by count_date asc limit 1 ");
		$r = $db->query("select date_format(media_access_count_date,'%Y')as most_old from media_access_count order by media_access_count_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//�ģ¥ǡ���������ֿ�����ǯ���������ʤʤ���к�ǯ+1��
		$r = $db->query("select date_format(media_access_count_date,'%Y')as most_old from media_access_count order by media_access_count_date desc limit 1 ");
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
