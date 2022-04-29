<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������󥭥󥰰����ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminRankingList extends Tv_ListViewClass
//class Tv_View_AdminRankingList extends Tv_ViewClass
{
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		/*
		 * �����
		 */
		$sqlWhere		= array();
		$sqlValues	 	= array();
		$sm = & $this->backend->getManager('Stats');
		$um =& $this->backend->getManager('Util');
		$am =& $this->backend->getManager('ActionList');
		
		/*
		 * �ѥ�᥿��������
		 */
		// [type]
		$type   = $this->af->get('type');
		if($type=='') $type='access';
		// [type]�����̤�[score]�ꥹ�Ȥ��������
		$this->stats_type = $sm->getStatsType();
		$this->score_keys = $this->stats_type[$type]['sql_score'];
		if(!is_array($this->score_keys)) $this->score_keys = array();
		
		// [term]
		$term	= $this->af->get('term');
		// [id]
		$id		= $this->af->get('id');
		// ǯ����
		$year 	= intval($this->af->get('year'));
		// �����
		$month 	= intval($this->af->get('month'));
		// ������
		$weekno	= intval($this->af->get('weekno'));
		// ������
		$day	= intval($this->af->get('day'));
		
		/*
		 * ���״��֤���ꤹ��
		 */
		if($term == '')		$term = 'all';
		// ǯ���פξ��
		if($year != '')		$term = 'year';
		// ��פξ��
		if($month != '')	$term = 'month';
		// �����פξ��
		if($weekno != '')	$term = 'week';
		// �����פξ��
		if($day != '')		$term = 'day';
		// [term]��ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->set('term', $term);
		
		/*
		 * ���־�������
		 */
		// ǯ���󤬤ʤ����ϸ���ǯ������
		if($term != "all" && $year == ""){
			$year = date("Y");
		}
		$this->af->set('year', $year);
		// ����󤬤ʤ����ϸ��߷������
		// �߷ס�ǯ���פξ��ϸ���ǯ����Ѥ��ʤ�
		if(!in_array($term,array('all','year')) && $month == ""){
			$month = intval(date("m"));
		}
		$this->af->set('month', $month);
		// �����󤬤ʤ�����¸�ߤ��ʤ�
		$this->af->set('weekno', $weekno);
		// �����󤬤ʤ�����¸�ߤ��ʤ�
		$this->af->set('day', $day);
		
		// [term]�̤˽�����ʬ��
		switch ($term) {
			// ǯñ��
			case 'year':
				// �ơ��֥�η���
				$table_name = "stats_{$type}_month";
				// ������������
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-01-01 00:00:00", $year);
				$sqlValues[] = sprintf("%04d-12-31 23:59:59", $year);
				// ɽ���������ǡ���������
				$this->af->set('date', sprintf("%04dǯ", $year));
				break;
			// ��ñ��
			case 'month':
				// �ơ��֥�η���
				$table_name = "stats_{$type}_day_{$year}";
				// ����ǯ��η��������������
				$end_day = $um->getDayCount($year, $month);
				// ������������
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-01 00:00:00", $year, $month);
				$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year, $month, $end_day);
				// ɽ���������ǡ���������
				$this->af->set('date', sprintf("%04dǯ%02d��", $year, $month));
				break;
			// ��ñ��
			case 'week':
				// �ơ��֥�η���
				$table_name = "stats_{$type}_day_{$year}";
				// ����ǯ��γ������Ƚ�λ�����������
				list($start_day, $end_day) = Tv_UtilManager::getDayOfWeekRange($year, $month, $weekno);
				// ������������
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $start_day);
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $end_day);
				// ɽ���������ǡ���������
				$this->af->set('date', sprintf("%04dǯ%02d����%d��", $year, $month, $weekno));
				break;
			// ��ñ��
			case 'day':
				// �ơ��֥�η���
				$table_name = sprintf("stats_{$type}_hour_{$year}_%02d", $month);
				// ������������
				$sqlWhere[] = "datetime >= ?";
				$sqlWhere[] = "datetime <= ?";
				$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $day);
				$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year, $month, $day);
				// ɽ���������ǡ���������
				$this->af->set('date', sprintf("%04dǯ%02d��%02d��", $year, $month, $day));
				break;
			// ����¾
			default:
				// �ơ��֥�η���
				$table_name = "stats_{$type}_year";
				// ɽ���������ǡ���������
				$this->af->set('date', "�߷�");
				break;
		}
		
		// ��������ǡ�����id�����ꤵ��Ƥ�����
		if($id != '') {
			// [id]���б�����[name]���������
			$name = $sm->getIdName($type, $id);
			$this->af->setApp('name', $name);
		}
		// �ơ��֥뤬¸�ߤ��ʤ�����SQL��¹Ԥ��ʤ�
		if($sm->isTableExists($table_name)){
			// ��������ǡ�����id�����ꤵ��Ƥ�����
			if($id != '') {
				// SQLʸ����
				$sqlSelect[] = 'id';
				$sqlSelect[] = 'datetime';
				foreach($sm->getSqlScore($type) as $v){
					$sqlSelect[] = "{$v}";
				}
				$sqlWhere[] = "id = ?";
				$sqlValues[] = $id;
			}else{
				// SQLʸ����
				if($type=='access'){
					$alm = $this->backend->getManager('ActionList');
					$this->af->setApp('al', $alm->getActionList());
				}else{
					// ���������ɲ�
					list($table_name, $sqlSelect, $sqlWhere) = $sm->addSqlIdName($type, $table_name, $sqlSelect, $sqlWhere);
				}
				$sqlSelect[] = 'id';
				foreach($sm->getSqlScore($type) as $v){
					$sqlSelect[] = "SUM({$v}) AS {$v}";
				}
			}
			$selectStr = implode(',',$sqlSelect);
			$whereStr = implode(' AND ',$sqlWhere);
			$sqlOrder = $sm->getSqlOrder($type);
			$param = array(
				'db_key'		=> 'stats',
				'action_name'	=> 'admin_stats_list',
				'sql_select'	=> $selectStr,
				'sql_from'		=> $table_name,
				'sql_where'		=> $whereStr,
				'sql_order'		=> $sqlOrder,
				'sql_values'	=> $sqlValues,
			);
			
			// ��������ǡ�����id�����ꤵ��Ƥ�����
			if($id != '') {
				$listview_data = $um->dataQuery($param);
			}
			// ��󥭥󥰤ξ��
			else{
				// listview��¹�
				$param['sql_group'] = 'id';
				$this->listview = $param;
				$this->build();
				$listview_data = $this->af->getApp('listview_data');
			}
		}
//print_r($param);
//print_r($listview_data);
		// �ǡ�������������
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
		
		// �ƥ�ץ졼�Ȥ˰����Ϥ�
		$this->af->setApp('listview_data', $listview_data);
		$this->af->setApp('total', $total);
		$this->af->setApp('score_keys', $this->score_keys);
	}
	
	// �߷ץǡ���ɽ���׻�
	function _calcListAll($listview_data, $param)
	{
		// ���٤Ƥ�ɽ���ѥ쥳���ɤ��Ф��ƽ�����Ԥ�
		foreach($listview_data as $k => $v){
			// ����ǡ����򥻥åȤ���
			$listview_data[$k]["stats_date"] = $v["datetime"];
		}
		return $listview_data;
	}
	
	// ǯ�ǡ���ɽ���׻�
	function _calcListYear($listview_data, $param)
	{
		// �ѿ��ν���
		$year = $param['year'];
		$stats_list=array();
		// ���٤Ƥη���Ф��ƽ�����Ԥ�
		for($i=1;$i<=12;$i++){
			// ��ñ�̤��ѿ�������
			$k = false;
			$hit = false;
			// ���ߤη������
			$thismonth = sprintf("%04d-%02d-01 00:00:00",$year,$i);
			// ɽ���Ѥη�ǡ���������
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-01",$year,$i);
			// ���٤Ƥ�ɽ���ѥ쥳���ɤ��Ф��Ƴ�ǧ��Ԥ�
			foreach($listview_data as $key => $v){
				// ���߷��ɽ���ѥ쥳���ɤ˹��פ����Τ�����аʲ��ν�����Ԥ�
				if($v["datetime"] == $thismonth){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// �����쥳���ɤ����ä����
			if($hit){
				// [score]�λ���
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]�ν����
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// ��ǡ���ɽ���׻�
	function _calcListMonth($listview_data, $param)
	{
		// �ѿ��ν���
		$year = $param['year'];
		$month = $param['month'];
		$end_day = $param['end_day'];
		$stats_list=array();
		// ���٤Ƥ������Ф��ƽ�����Ԥ�
		for($i=1;$i<=$end_day;$i++){
			// ��ñ�̤��ѿ�������
			$k = false;
			$hit = false;
			// ���ߤ���������
			$today = sprintf("%04d-%02d-%02d 00:00:00",$year,$month,$i);
			// ɽ���Ѥ����ǡ���������
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d",$year,$month,$i);
			// ���٤Ƥ�ɽ���ѥ쥳���ɤ��Ф��Ƴ�ǧ��Ԥ�
			foreach($listview_data as $key => $v){
				// ���߷��ɽ���ѥ쥳���ɤ˹��פ����Τ�����аʲ��ν�����Ԥ�
				if($v["datetime"] == $today){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// �����쥳���ɤ����ä����
			if($hit){
				// [score]�λ���
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]�ν����
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// ���ǡ���ɽ���׻�
	function _calcListWeek($listview_data, $param)
	{
		// �ѿ��ν���
		$year = $param['year'];
		$month = $param['month'];
		$start_day = $param['start_day'];
		$end_day = $param['end_day'];
		$stats_list=array();
		// ���٤Ƥ������Ф��ƽ�����Ԥ�
		for($i=$start_day;$i<=$end_day;$i++){
			// ��ñ�̤��ѿ�������
			$k = false;
			$hit = false;
			// ���ߤ���������
			$today = sprintf("%04d-%02d-%02d 00:00:00",$year,$month,$i);
			// ɽ���Ѥ����ǡ���������
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d",$year,$month,$i);
			// ���٤Ƥ�ɽ���ѥ쥳���ɤ��Ф��Ƴ�ǧ��Ԥ�
			foreach($listview_data as $key => $v){
				// ���߷��ɽ���ѥ쥳���ɤ˹��פ����Τ�����аʲ��ν�����Ԥ�
				if($v["datetime"] == $today){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// �����쥳���ɤ����ä����
			if($hit){
				// [score]�λ���
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]�ν����
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// ���ǡ���ɽ���׻�
	function _calcListDay($listview_data, $param)
	{
		// �ѿ��ν���
		$year = $param['year'];
		$month = $param['month'];
		$day = $param['day'];
		$stats_list=array();
		// ���٤Ƥλ����Ф��ƽ�����Ԥ�
		for($i=0;$i<=23;$i++){
			// ��ñ�̤��ѿ�������
			$k = false;
			$hit = false;
			// ���ߤλ��������
			$thishour = sprintf("%04d-%02d-%02d %02d:00:00",$year,$month,$day,$i);
			// ɽ���Ѥλ���ǡ���������
			$stats_list[$i]["stats_date"] = sprintf("%04d-%02d-%02d %02d:00:00",$year,$month,$day,$i);
			// ���٤Ƥ�ɽ���ѥ쥳���ɤ��Ф��Ƴ�ǧ��Ԥ�
			foreach($listview_data as $key => $v){
				// ���߷��ɽ���ѥ쥳���ɤ˹��פ����Τ�����аʲ��ν�����Ԥ�
				if($v["datetime"] == $thishour){
					$k = $key;
					$hit = true;
					break;
				}
			}
			
			// �����쥳���ɤ����ä����
			if($hit){
				// [score]�λ���
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = $listview_data[$k][$sk];
				}
			}else{
				// [score]�ν����
				foreach($this->score_keys as $sk){
					$stats_list[$i][$sk] = 0;
				}
			}
		}
		return $stats_list;
	}
	
	// ����դη׻���Ԥ�
	function _calcList($listview_data, $param)
	{
//		print_r($listview_data);
		// ��ȥ�����ɽ���ξ��
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
		
		// �����
		foreach($this->score_keys as $sk){
			$total[$sk] = 0;
		}
		
		// ������listview_data
		$listview_data_new = array();
		
		// �ƥǡ����ι�פ�׻�����
		foreach($listview_data as $k => $v){
			foreach($this->score_keys as $sk){
				$total[$sk] = $this->_addTotal($v,$sk,$total[$sk]);
			}
		}
		// ������ͤ��᤽�����˥С���Ĺ����Ψ��׻�����
		$total_array = array();
		foreach($this->score_keys as $sk){
			$total_array[] = $total[$sk];
		}
		$total_max = max($total_array);
		
		// ������Ĺ����Ф��Ȥ��Υǡ������Ѱդ���
		foreach($listview_data as $k => $v){
			foreach($this->score_keys as $sk){
				$v["{$sk}_each"] = $this->_calcData( $v, $sk ,$total_max );
			}
			$listview_data_new[] = $v;
		}
		
		return array($listview_data_new, $total);
	}
	
	// ����ͤ˲û�����
	function _addTotal($array,$key,$total){
		if(array_key_exists($key,$array)){
			$total += $array[$key];
		}
		return $total;
	}
	
	// �С���Ĺ������Ψ�򻻽Ф���
	function _calcData($array,$key,$total){
		if(array_key_exists($key,$array) && $total){
			return round( $array[$key]/$total * 100 );
		}
		return 0;
	}
}
?>