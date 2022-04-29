<?php
/**
 * Report.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ���������������Ͻ��ײ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminAccessReport extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		
		//DB����
		$db = $this->backend->getDB();
		
		//�����������Ϥ������ڡ���̾
		$access_key = $this->af->get('access_key');
		
		//�ڡ���̾�μ����������������Ϥ���Τϡ��Ȥꤢ�����桼����¦�Τߡ�Tv_Action_User��ɬ���Ĥ��ΤǤȤ롣
		$short_access_key = str_replace('Tv_Action_User','',$this->af->get('access_key'));
		
		//���������ڡ���̾�Τ�ɽ���Ѥ˥��å�
		$this->af->setApp('short_access_key',$short_access_key);
		
		//Util����
		$um =& $this->backend->getManager('Util');
		
		//ǯ��������������
		$year = $this->af->get('year');
		$month = $this->af->get('month');
		if($year == "") $year = date("Y");
		if($month == "") $month = date("m");
		$end_day = $um->getDayCount($year,$month);
		$access_date = sprintf("%04d-%02d",$year,$month);
		
		//���ꤵ�줿���ա��ڡ���̾�ΤǤΥ�������������������
		$sql = "select access_id,access_date,access_key,access_num,date_format(access_date,'%e')as access_date_e from access ";
		$sql.= " where access_key = ? AND access_date LIKE ? ORDER BY access_date ASC ";
		$values = array($access_key,$access_date.'%');
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		
		//��������������������access_num�����󲽡�Array ( [8] => 38 [9] => 94 [10] => 90 ) 
		foreach($rows as $key => $v){
			$i = $v['access_date_e'];
			$res_list[$i] = $v['access_num'];
		}
		
		//����������ʬ�����֤�
		for($i=1;$i<=$end_day;$i++){
			
			//�ꥹ������
			$access_list[$i]["access_year"] = $year;
			$access_list[$i]["access_month"] = $month;
			$access_list[$i]["access_day"] = $i;
			$today = sprintf("%04d-%02d-%02d",$year,$month,$i);
			//$access_list[$i]["access_today"] = sprintf("%04d%02d%02d",$year,$month,$i);
			$access_list[$i]["access_date"] = $today;
			
			//�������դ˥�����������access_num�����������
			if(!@is_null($res_list[$i])){
				$access_list[$i]["access_num"] = $res_list[$i];
			}
			//�������դ˥�����������access_num���ʤ���0����
			else{
				$access_list[$i]["access_num"] = 0;
			}
		}
		
		//ɽ���Ѥ˥��å�
		$this->af->setApp('access_list',$access_list);
		
		/*
		// ǯ���ץ����
		$year_list[""]["name"] = "ǯ";
		for($i=2007;$i<=2007;$i++){
			$year_list[$i]["name"] = $i;
		}
		$this->af->setApp("year_list",$year_list);

		// ��ץ����
		$month_list[""]["name"] = "��";
		for($i=1;$i<=12;$i++){
			$month_list[$i]["name"] = $i;
		}
		$this->af->setApp("month_list",$month_list);
		*/
		
		
		//�ģ¥ǡ���������ָŤ�ǯ���������ʤʤ���к�ǯ��
		//$r = $db->query("select date_format(banner_access_date,'%Y')as most_old from banner_access order by banner_access_date asc limit 1 ");
		$r = $db->query("select date_format(access_date,'%Y')as most_old from access order by access_date asc limit 1 ");
		while($item = $r->fetchRow()){
			$most_old = $item[0];
		}
		if(!$most_old){ $most_old = date('Y'); }
		
		//�ģ¥ǡ���������ֿ�����ǯ���������ʤʤ���к�ǯ+1��
		$r = $db->query("select date_format(access_date,'%Y')as most_new from access order by access_date desc limit 1 ");
		while($item = $r->fetchRow()){
			$most_new = $item[0];
		}
		if(!$most_new){ $most_old = date('Y')+1; }
		
		
		// ǯ���ץ����
		$year_list[""]["name"] = "ǯ";
		//for($i=2007;$i<=2007;$i++){	/*}*/
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
