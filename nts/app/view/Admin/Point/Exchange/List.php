<?php

class Tv_View_AdminPointExchangeList extends Tv_ViewClass
{
	function preforward()
	{
		$where = "";
		
		// �桼��ID����
		if($this->af->get('user_id') != ""){
			$where .= "u.user_id = ? AND ";
			$values[] = $this->af->get('user_id');
		}
		// �桼���˥å��͡��ม��
		if($this->af->get('user_nickname')){
			$where .= "u.user_nickname LIKE  ?  AND ";
			$values[] = "%" . $this->af->get('user_nickname') . "%";
		}
		// �ݥ���ȥ�����
		if($this->af->get('point_type') != ""){
			if($this->af->get('point_type') != '0'){
				$where .= "p.point_type = ? AND ";
				$values[] = $this->af->get('point_type');
			}
		}
		// �ݥ���ȥ��ơ�����
		if($this->af->get('point_status') != ""){
			$where .= "p.point_status = ? AND ";
			$values[] = $this->af->get('point_status');
		}
		// �ݥ���ȼ�����������
		if(	$this->af->get('point_exchange_year_start') != "" && $this->af->get('point_exchange_year_end') != "" && 
			$this->af->get('point_exchange_month_start') != "" && $this->af->get('point_exchange_month_end') != "" &&
			$this->af->get('point_exchange_day_start') != "" && $this->af->get('point_exchange_day_end') != ""
		){
			$point_exchange_date_start = sprintf("%04d-%02d-%02d 00:00:00",$this->af->get('point_exchange_year_start'),$this->af->get('point_exchange_month_start'),$this->af->get('point_exchange_day_start'));
			$point_exchange_date_end = sprintf("%04d-%02d-%02d 23:59:59",$this->af->get('point_exchange_year_end'),$this->af->get('point_exchange_month_end'),$this->af->get('point_exchange_day_end'));
			$where .= "pe.point_exchange_time > ? AND pe.point_exchange_time < ? AND ";
			$values[] = $point_exchange_date_start;
			$values[] = $point_exchange_date_end;
		}
		// �ʲ�DB���䤤��碌
		$db = $this->backend->getDB();
		// ����ɽ������ڡ����Ǥϲ����ܤ���ɽ������Τ�
		$this->offset = $this->af->get('start') == null ? 0 : $this->af->get('start');
		// ���ڡ������ɽ��������
		$this->count = $this->config->get('admin_list_count');
		
		// ������䤤��碌��������������
		$sql = "SELECT count(u.user_id) FROM user as u, point as p, point_exchange as pe WHERE " .
			 $where ." u.user_status = 2 AND u.user_id = p.user_id AND p.point_id = pe.point_id" .
			" ORDER BY pe.point_exchange_time DESC";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		$this->total = $rows[0]['count(u.user_id)'];
		
		// Limit�η���
		// CSV�˽��Ϥ���Ȥ�������ǡ������������
		if($this->af->get('csv')){
			$sqlLimit ="";
		}
		// ����¾�ξ����̾��̤�ڡ����󥰽�����Ԥ�
		else{
			$sqlLimit = " Limit ".$this->offset.",".$this->count;
		}
		// �ºݤ˺���Υڡ�����ɽ������ǡ������������
		$sql = "SELECT u.user_id, u.user_nickname, p.point_id,p.point, p.point_type, p.point_status, pe.point_exchange_time, pe.ebank_branch, pe.ebank_account_number, pe.ebank_account_name, pe.edy_number  FROM user as u, point as p, point_exchange as pe WHERE " . 
			$where ." u.user_status = 2  AND u.user_id = p.user_id AND p.point_id = pe.point_id" .
			" ORDER BY pe.point_exchange_time DESC" . $sqlLimit;
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		// ��׶�ۤʤɤ�׻�����
		$total_price = 0;
		$point_exchange = $this->config->get('point_exchange');
		foreach($rows as $k =>$v){
			// �����Х󥯤ޤ���edy�ξ��Τ߼�����׻�
			if($v['point_type'] == 10){
				$point_rate = $point_exchange[1]['point_rate'];
			}elseif($v['point_type'] == 11){
				$point_rate = $point_exchange[2]['point_rate'];
			}else{
				$point_rate = 0;
			}
			$price = 0 - ($v['point'] + $point_rate) * $this->config->get('point_yen');
			$total_price += $price;
			$rows[$k]['price'] = $price;
		}
		$this->af->setApp('total_price', $total_price);
		$this->af->setApp('point_list', $rows);
		
		// �ڡ���������
		$um =& $this->backend->getManager('Util');
		$pager = $um->getPager($this->total,$this->offset,$this->count,'action_admin_point_exchange_list');
		$this->af->setApp('pager', $pager);
	}

	/**
	 * CSV����Ϥ���
	 */
	function forward()
	{
		// CSV��������ɤξ��
		if($this->af->get('csv')){
			$file_name = date('Ymd_His') . ".csv";
			header("Content-Disposition: inline ; filename=$file_name" );
			header("Content-type: text/octet-stream");
			header("Content-Length: ". strlen($result));
			
			if($this->af->get('point_type') ==10){
				$template = 'ebank';
			}elseif($this->af->get('point_type') ==11){
				$template = 'edy';
			}else{
				$template = 'normal';
			}
		}
		if($template){
			$renderer =& $this->_getRenderer();
			$this->_setDefault($renderer);
			$html = $renderer->engine->fetch('admin/csv/' . $template . '.tpl');
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
		}else{
			parent::forward();
		}
	}
}
?>