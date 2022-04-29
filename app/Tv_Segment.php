<?php
/**
 * Tv_Segment.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ȥޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_SegmentManager extends Ethna_AppManager
{
	/* var �������ȥ��� */
	var $segment_keys = array(
		// 1. ����ꥢ
		'user_carrier',
		// 2. ����
		'user_sex',
		// 3. ����
		'prefecture_id',
		// 4. ����
		'job_family_id',
		// 5. �ȼ�
		'business_category_id',
		// 6. �뺧
		'user_is_married',
		// 7. �Ҷ�
		'user_has_children',
		// 8. ��շ�
		'user_blood_type',
		// 9. ��̳��
		'work_location_prefecture_id',
		// 10. ��Ͽ��
		//'user_created',
		// 14. ����ID
		'item_id',
	);
	
	/**
	 * �������ȥ������ֵѤ���
	 */
	function getSegmentKeys()
	{
		return $this->segment_keys;
	}
	
	/**
	 * ���֥������Ȥ˥������ȥѥ�᥿�򥻥åȤ���
	 */
	function setSegment($m)
	{
		// �������ȥ������Ф��ƽ�����Ԥ�
		foreach($this->segment_keys as $v){
			// �ѥ�᥿��������ϡ�1��
			$key = $v.'_status';
			if($this->af->get($key)){
				$m->set($key, 1);
			}
			// �ѥ�᥿���ʤ����ϡ�0��
			else{
				$m->set($key, 0);
			}
			// �ѥ�᥿�򥻥åȤ���
			$m = $this->setSegmentParam($m, $v);
			$this->af = $this->setSegmentParam($this->af, $v);
		}
		// 11. �ݥ���ȡʥ���ݡ��ȺѤߡ�
		if(!$this->af->get('user_point_status')){
			$m->set('user_point_status', 0);
		}
		// 12. ǯ��ʥ���ݡ��ȺѤߡ�
		if(!$this->af->get('user_age_status')){
			$m->set('user_age_status', 0);
		}
		// 13. ��Ͽ����
		if(!$this->af->get('user_created_status')){
			$m->set('user_created_status', 0);
		}
		if(
			$this->af->get('user_created_year_start') && $this->af->get('user_created_month_start') && $this->af->get('user_created_day_start') &&
			$this->af->get('user_created_year_end') && $this->af->get('user_created_month_end') && $this->af->get('user_created_day_end')
		){
			$user_created_date_start = sprintf("%04d-%02d-%02d 00:00:00",
										$this->af->get('user_created_year_start'),
										$this->af->get('user_created_month_start'),
										$this->af->get('user_created_day_start')
									);
			$user_created_date_end = sprintf("%04d-%02d-%02d 23:59:59",
										$this->af->get('user_created_year_end'),
										$this->af->get('user_created_month_end'),
										$this->af->get('user_created_day_end')
									);
			$m->set('user_created_date_start', $user_created_date_start);
			$m->set('user_created_date_end', $user_created_date_end);
		}
		
		return $m;
	}
	
	/**
	 * �������ȥ桼���ꥹ�Ȥ��������
	 *
	 */
	function getSegmentUser($segment_id='')
	{
		$um = $this->backend->getManager('Util');
		
		// ��������ID�λ��꤬������
		if($segment_id){
			$s = new Tv_Segment($this->backend, 'segment_id', $segment_id);
			$s->exportform();
		}
		
		// DB����³����
		$db = $this->backend->getDB();
		
		// �᡼�������桼���ꥹ�Ȥμ���
		$sqlValues = array();
		$sqlWhere = "user_status = 2 AND user_magazine_error_num < " . $this->config->get('mail_error_count') ." AND user_mail_ok = 1";
		foreach($this->segment_keys as $v){
			// �������ȼ����Υ��ơ����������ꡢ�ѥ�᥿��¸�ߤ�����Τ߳����֥�å���SQLʸ����������
			if($this->af->get($v . '_status') && $this->af->get($v) != ""){
				$sqlWhere = $this->setSqlSegment($sqlWhere, $v);
			}
		}
		// 11. �ݥ���ȡʥ������ݡ��ȺѤߡ�
		if($this->af->get('user_point_status')){
			$start_point = $this->af->get('segment_point_min');
			$end_point = $this->af->get('segment_point_max');
			if($start_point != 0 && $end_point != 0){
				$sqlValues[] = $start_point;// ��
				$sqlValues[] = $end_point;// ��
				$sqlWhere .= " AND user_point >= ?";// ��
				$sqlWhere .= " AND user_point <= ?";// ��
			}
		}
		// 12. ǯ��ʥ������ݡ��ȺѤߡ�
		if($this->af->get('user_age_status')){
			$start_age = $this->af->get('user_age_min');
			$end_age = $this->af->get('user_age_max');
			if($start_age != 0 && $end_age != 0){
				$start_age = $um->getBirthday($start_age);
				$end_age = $um->getBirthday($end_age);
				// ������
				$sqlValues[] = $start_age['over'];
				// �Ǿ���
				$sqlValues[] = $end_age['under'];
				$sqlWhere .= " AND user_birth_date <= ?";// �����硢ǯ��
				$sqlWhere .= " AND user_birth_date >= ?";// ���񾮡�ǯ����
			}
		}
		// 13. ��Ͽ����
		if($this->af->get('user_created_status')){
			// �ե������ͳ�ξ��
			if(
				$this->af->get('user_created_year_start') && $this->af->get('user_created_month_start') && $this->af->get('user_created_day_start')
				&&
				$this->af->get('user_created_year_end') && $this->af->get('user_created_month_end') && $this->af->get('user_created_day_end')
			){
				$start_time = sprintf("%04d-%02d-%02d 00:00:00",
											$this->af->get('user_created_year_start'),
											$this->af->get('user_created_month_start'),
											$this->af->get('user_created_day_start')
										);
				$end_time = sprintf("%04d-%02d-%02d 23:59:59",
											$this->af->get('user_created_year_end'),
											$this->af->get('user_created_month_end'),
											$this->af->get('user_created_day_end')
										);
			}
			// DB��ͳ�ξ��
			else{
				$start_time = $this->af->get('user_created_date_start');
				$end_time = $this->af->get('user_created_date_end');
			}
			if($start_time && $end_time){
				$sqlValues[] = $start_time;
				$sqlValues[] = $end_time;
				$sqlWhere .= " AND user_created_time >= ?";
				$sqlWhere .= " AND user_created_time <= ?";
			}
		}
		// 14. item_id
		// �����������ȤΤ��뾦�ʤǸ����������cart,item,user_order�ơ��֥�򸫤˹Ԥ��ΤǤ�������
		if($this->af->get('item_id_status')){
			$sqlWhere  = str_replace('item_id','i.item_id',$sqlWhere);
			$sqlWhere .= " AND u.user_id = o.user_id ";
			$sqlWhere .= " AND o.cart_hash = c.cart_hash ";
			$sqlWhere .= " AND c.item_id = i.item_id ";
			$sql =  " SELECT distinct u.user_hash, u.user_mailaddress, u.user_nickname, u.user_point "
					." FROM user u, user_order o, item i, cart c  WHERE  {$sqlWhere}";
		}else{
			$sql = "SELECT * FROM user WHERE  {$sqlWhere}";
		}
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);

//foreach($this->backend->db_list as $a)echo($a->db->last_query);
//debug
//print $sql;
//print_r($sqlValues);
//$data = "";
//foreach($rows as $v){ $data .= $v['user_id'] . "\n";}
//$data = $rows->getDebugInfo();
//mail("kazuya.fujimori@gmail.com", "seg", $data, "From:info@euphee.com");
//mail("ebisawa@technovarth.co.jp", "seg", $data, "From:info@euphee.com");
//foreach($this->backend->db_list as $a)echo($a->db->last_query);

		return $rows;
	}
	
	/**
	 * ���֥������Ȥ˥ѥ�᥿�򥻥åȤ���
	 */
	function setSegmentParam($m, $k)
	{
		$param = $this->af->get($k);
		if(is_array($param)){
			$value = "";
			foreach($param as $v){
				if($v != ""){
					if($value == ""){
						$value .= $v;
					}else{
						$value .= "," . $v;
					}
				}
			}
			// ���å�
			$m->set($k, $value);
		}else{
			// ���å�
			$m->set($k, "");
		}
		return $m;
	}
	
	/**
	 * ���֥������Ȥ�ʬ�򤷤��ѥ�᥿�򥻥åȤ���
	 */
	function setDivSegment($m, $k)
	{
		$param = $this->af->get($k);
		$p = explode(',', $param);
		if(is_array($p)){
			$value = array();
			foreach($p as $v){
				if($v != ""){
					$value[] = $v;
				}
			}
			// ���å�
			$this->af->set($k, $value);
		}
		return $this->af;
	}
	
	/**
	 * ʬ�򤷤��ѥ�᥿����SQL������
	 */
	function setSqlSegment($sqlWhere, $k)
	{
		$param = $this->af->get($k);
		$p = explode(',', $param);
		if(is_array($p)){
			$value = "";
			foreach($p as $v){
				if($v != ""){
					if($value == ""){
						$value .= " AND ( " . $k . " = " . $v;
					}else{
						$value .= " OR " . $k . " = " . $v;
					}
				}
			}
			// ���å�
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
	
	/**
	 * ����ѥ�᥿����SQL������
	 */
	function setSqlParam($sqlWhere, $k)
	{
		$p = $this->af->get($k);
		if(is_array($p)){
			$value = "";
			foreach($p as $v){
				if($v != ""){
					if($value == ""){
						$value .= " AND ( " . $k . " = " . $v;
					}else{
						$value .= " OR " . $k . " = " . $v;
					}
				}
			}
			// ���å�
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
}

/**
 * �������ȥ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Segment extends Ethna_AppObject
{
}
?>