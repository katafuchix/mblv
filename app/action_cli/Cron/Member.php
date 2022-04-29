<?php
/**
 * Stats.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Cron]���ײ��ϥ�������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
/*
�����ץ롼��
��[ǯ��]1��1��00��00ʬ
��[�]���1��00��00ʬ
��[����]����00��00ʬ
��[����]���00ʬ
*/
class Tv_Cli_Action_CronStats extends Tv_ActionClass
{
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// ���������
		$argv = $_SERVER['argv'];
		// [type]�����
		$type = $argv[1];
		// [term]�����
		$term = $argv[2];
		
		// ���ײ��ϥޥ͡������ư
		$sm = & $this->backend->getManager('Stats');
		$sm->rotateStats($type, $term);
		
		// ��λ
		exit;
	}
	
	
	/**
	 * ���ǡ�������������
	 * type��[ad|banner]
	 * date��[hour|month|year|day]
	 */	
	function statsCronLog($key_name, $data_type)
	{
		$s = & $this->backend->getManager('Stats');
		$db = & $this->backend->getDB('stats');
		
		$sql = $s->getCreateTable($key_name,$data_type);
		
		$r = $db->db->query($sql);
		
		$stats = $s->getStats( $key_name );
		
		// �������륫���̾
		$select_column = $stats['sql_select'][$data_type];
	 	$select_str = 	implode(',',$select_column);
		
		// sql
		$sql_keys = $stats['sql_key'];
		
		// �׻��������
		$sql_stats_cols = $stats['sql_stats'];
		
		// �ǡ�������������������
		$sql_date_column = $stats['sql_date_column'];
		
		// ���ǡ������������ơ��֥�
		$sql_from = $stats['sql_table'] ;
		
		// �ǡ�����Ǽ�ơ��֥�
		$table_name = "";
		$sql_values = array();
		switch($data_type)
		{
			case 'month':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m",$this->getPreDate('month',-1)).'%';
					break;
			case 'hour':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m-d H",$this->getPreDate('hour',-1)).'%';
					break;
			case 'day':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m-d",$this->getPreDate('day',-1)).'%';
					break;
			case 'year':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y",$this->getPreDate('year',-1)).'%';
					break;
			default:
					break;
		}
		
		$um =& $this->backend->getManager('Util');
		
		$param = array(
			//'db_key'		=> '',
			'sql_select'	=> $select_str,
			'sql_from'		=> $sql_from,
			'sql_where'		=> $sql_date_column.' like ?',
			'sql_values'	=> $sql_values,
			'sql_group'		=> $stats['sql_group'] ,
		);
		$r = $um->dataQuery($param);
		
		foreach($r as $k=>$v){
			$sql_col = array();
			
			//$sql_col[] 	= $s->getTableKey($key_name,$data_type);
			
			
			switch($data_type)
			{
				case 'month':
						$sql_col[]	= "stats_".$key_name."_month_id";
						break;
				case 'hour':
						$sql_col[] 	= "stats_".$key_name."_hour_id";
						break;
				case 'day':
						$sql_col[] 	= "stats_".$key_name."_day_id";
						break;
				case 'year':
						$sql_col[] 	= "stats_".$key_name."_year_id";
						break;
				default:
						break;
			}
			
			// ����������ܤ�������� uu, view, click �ʤ�
			foreach($sql_stats_cols as $col_k => $col_v){
				$sql_col[] = $col_v;
			}
			
			// where �����
			$sql_where = array();
			foreach($sql_keys as $s){
				$sql_where[] = $s. '=?';
			}
			
			// where value
			$where_values = array();
			foreach($sql_keys as $s){
				$where_values[] = $v[$s];
			}

			// hour�λ���ǯ�������������ꤹ��
			if($data_type == 'hour'){
					$sql_where[] = 'year  = ?';
					$sql_where[] = 'month = ?';
					$sql_where[] = 'day   = ?';
					$sql_where[] = 'hour  = ?';
					
					$where_values[] = intval(date("Y",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("m",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("d",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("H",$this->getPreDate('hour',-1)));
			}
			
			$param = array(
				'db_key'		=> 'stats',
				'sql_select'	=> implode(',',$sql_col),
				'sql_from'		=> $table_name,
				'sql_where'		=> implode(' AND ',$sql_where),
				'sql_values'	=> $where_values,
			);
			$r2 = $um->dataQuery($param);
			

			if(count($r2)){
			
				foreach($r2 as $k2=>$v2){
					$array = array();
				
					// ����������ܥǡ��� uu, view, click �ʤ�
					foreach($sql_stats_cols as $col_k => $col_v){
						$array[$col_v] = $v2[$col_v] + $v[$col_v];
					}

					foreach($sql_keys as $s){
						$array[$s] = $v[$s];
					}
			
					$res = $db->db->autoExecute($table_name, $array, DB_AUTOQUERY_UPDATE, $sql_col[0]."=".$v2[$sql_col[0]]); 

				}
				
			}else{

				$array = array();
				
				// ����������ܥǡ��� uu, view, click �ʤ�
				foreach($sql_stats_cols as $col_k => $col_v){
					$array[$col_v] = $v[$col_v];
				}
				
				foreach($sql_keys as $s){
					$array[$s] = $v[$s];
				}
					
				if($data_type == 'hour'){
						$array['year'] 		= $v[year];
						$array['month'] 	= $v[month];
						$array['day'] 		= $v[day];
						$array['week'] 		= $v[dayofweek];
						$array['hour'] 		= $v[hour];
						$array['created_time'] 	= date('Y-m-d H:i:s');
				}
				if($data_type == 'day'){
						$array['year'] 		= $v[year];
						$array['month'] 	= $v[month];
						$array['day'] 		= $v[day];
						$array['week'] 		= $v[dayofweek];
						$array['created_time'] 	= date('Y-m-d H:i:s');
				}
				
				$res = $db->db->autoExecute($table_name, $array,DB_AUTOQUERY_INSERT); 

			}
			
		}
		
	}



	function statsMediaLog($key_name, $data_type){

		$media_status	= array('access','mail','regist','send');
		
		$s = & $this->backend->getManager('Stats');
		$db = & $this->backend->getDB('stats');

		$sql = $s->getCreateTable($key_name,$data_type);

		$r = $db->db->query($sql);
				
		$stats = $s->getStats( $key_name );
		
		// �������륫���̾
		$select_column = $stats['sql_select'][$data_type];
	 	$select_str = 	implode(',',$select_column);

		// sql
		$sql_keys = $stats['sql_key'];

		// �׻��������
		$sql_stats_cols = $stats['sql_stats'];
				
		// �ǡ������������������� stats_xxxx�ʤɤǻ��֤����äƤ���Ȥ���
		$sql_date_column = $stats['sql_date_column'];
		
		// ���ǡ������������ơ��֥� stats_xxxxx�ʤ�
		$sql_from = $stats['sql_table'] ;

		// �ǡ�����Ǽ�ơ��֥�
		$table_name = "";
		$sql_values = array();
		switch($data_type)
		{
			case 'month':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m",$this->getPreDate('month',-1)).'%';
					break;
			case 'hour':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m-d H",$this->getPreDate('hour',-1)).'%';
					break;
			case 'day':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y-m-d",$this->getPreDate('day',-1)).'%';
					break;
			case 'year':
					$table_name		= $s->getTableName($key_name,$data_type);
					$sql_values[]	= date("Y",$this->getPreDate('year',-1)).'%';
					break;
			default:
					break;
		}

		$um =& $this->backend->getManager('Util');

		$param = array(
			//'db_key'		=> '',
			'sql_select'	=> $select_str,
			'sql_from'		=> $sql_from,
			'sql_where'		=> $sql_date_column.' like ?',
			'sql_values'	=> $sql_values,
			'sql_group'		=> $stats['sql_group'] ,
		);
		$r = $um->dataQuery($param);

		foreach($r as $k=>$v){

			$sql_col = array();
			
			//$sql_col[] 	= $s->getTableKey($key_name,$data_type);
			
			switch($data_type)
			{
				case 'month':
						$sql_col[]	= "stats_".$key_name."_month_id";
						break;
				case 'hour':
						$sql_col[] 	= "stats_".$key_name."_hour_id";
						break;
				case 'day':
						$sql_col[] 	= "stats_".$key_name."_day_id";
						break;
				case 'year':
						$sql_col[] 	= "stats_".$key_name."_year_id";
						break;
				default:
						break;
			}
			
		// ����������ܤ�������� uu, view, click �ʤ�
		//	foreach($sql_stats_cols as $col_k => $col_v){
		//		$sql_col[] = $col_v;
		//	}

			foreach($media_status as $col_k => $col_v){
				$sql_col[] = $col_v;
			}

			// where �����
			$sql_where = array();
			foreach($sql_keys as $s){
				$sql_where[] = $s. '=?';
			}

			// where value
			$where_values = array();
			foreach($sql_keys as $s){
				$where_values[] = $v[$s];
			}

			// hour�λ���ǯ�������������ꤹ��
			if($data_type == 'hour'){
					$sql_where[] = 'year  = ?';
					$sql_where[] = 'month = ?';
					$sql_where[] = 'day   = ?';
					$sql_where[] = 'hour  = ?';
					
					$where_values[] = intval(date("Y",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("m",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("d",$this->getPreDate('hour',-1)));
					$where_values[] = intval(date("H",$this->getPreDate('hour',-1)));
			}
			
			$param = array(
				'db_key'		=> 'stats',
				'sql_select'	=> implode(',',$sql_col),
				'sql_from'		=> $table_name,
				'sql_where'		=> implode(' AND ',$sql_where),
				'sql_values'	=> $where_values,
			);
			$r2 = $um->dataQuery($param);
			
			if(count($r2)){
			
				foreach($r2 as $k2=>$v2){
					$array = array();
					
					// media_access_count_status �򻲾Ȥ��ƤɤΥǡ���������
					if(array_key_exists($sql_stats_cols[0], $v)){
						$array[$media_status[$v[$sql_stats_cols[0]]]] = $v[$sql_stats_cols[1]];
					}
					
					foreach($sql_keys as $s){
						$array[$s] = $v[$s];
					}
			
					$res = $db->db->autoExecute($table_name, $array, DB_AUTOQUERY_UPDATE, $sql_col[0]."=".$v2[$sql_col[0]]); 

				}
				
			}else{

				$array = array();

				// media_access_count_status �򻲾Ȥ��ƤɤΥǡ���������
				if(array_key_exists($sql_stats_cols[0], $v)){
						$array[$media_status[$v[$sql_stats_cols[0]]]] = $v[$sql_stats_cols[1]];
				}
				
				foreach($sql_keys as $s){
					$array[$s] = $v[$s];
				}
					
				if($data_type == 'hour'){
						$array['year'] 		= $v[year];
						$array['month'] 	= $v[month];
						$array['day'] 		= $v[day];
						$array['week'] 		= $v[dayofweek];
						$array['hour'] 		= $v[hour];
						$array['created_time'] 	= date('Y-m-d H:i:s');
				}
				if($data_type == 'day'){
						$array['year'] 		= $v[year];
						$array['month'] 	= $v[month];
						$array['day'] 		= $v[day];
						$array['week'] 		= $v[dayofweek];
						$array['created_time'] 	= date('Y-m-d H:i:s');
				}
				
				$res = $db->db->autoExecute($table_name, $array,DB_AUTOQUERY_INSERT); 

			}
			
		}
		
	}




	/**
	* ������������������ֵѤ���
	* @param
		$type
			year,month,day,hour
		$pre 
			�����ǻ��ꤹ�� -1�ʤ�
		date("Y-m-d H",$this->getPreDate('day',-1)) // ����������
		date("Y-m-d H",$this->getPreDate('hour',-1)); // 1������������
	*/
	function getPreDate($type,$pre){
	    $now = time();
	    $preDate = "";
		switch($type)
		{
			case 'year':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
			case 'month':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now)+$pre,date("d",$now),date("Y",$now));
				break;
			case 'day':
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now)+$pre,date("Y",$now));
				break;
			case 'hour':
				$preDate = mktime(date("H",$now)+$pre,date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now));
				break;
			default:
				$preDate = mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now)+$pre);
				break;
		}		
	    return $preDate;
	}
	
	/**
	 * ���������դ��������ؿ�  date("Y-m-d",getDay(-1)); // ����������
	 * ���������˵�ư���뤿��
	 * 
	 */	
	function getDay($day){
	    $now = time();
	    return mktime(date("H",$now),date("i",$now),date("s",$now),date("m",$now),date("d",$now)+$day,date("Y",$now));
	}

	/**
	 * �������������դ��������ؿ�  date("Y-m-d H",getPreHour(-1));// 1������������
	 * ���0ʬ�˵�ư���뤿�������֤Υ����������
	 * 
	 */	
	function getPreHour($pre){
	    $now = time();
	    return mktime(date("H",$now)+$pre,date("i",$now),date("s",$now),date("m",$now),date("d",$now),date("Y",$now));
	}
}
?>