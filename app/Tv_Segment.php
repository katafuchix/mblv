<?php
/**
 * Tv_Segment.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * セグメントマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_SegmentManager extends Ethna_AppManager
{
	/* var セグメントキー */
	var $segment_keys = array(
		// 1. キャリア
		'user_carrier',
		// 2. 性別
		'user_sex',
		// 3. 住所
		'prefecture_id',
		// 4. 職種
		'job_family_id',
		// 5. 業種
		'business_category_id',
		// 6. 結婚
		'user_is_married',
		// 7. 子供
		'user_has_children',
		// 8. 血液型
		'user_blood_type',
		// 9. 勤務地
		'work_location_prefecture_id',
		// 10. 登録日
		//'user_created',
		// 14. 商品ID
		'item_id',
	);
	
	/**
	 * セグメントキーを返却する
	 */
	function getSegmentKeys()
	{
		return $this->segment_keys;
	}
	
	/**
	 * オブジェクトにセグメントパラメタをセットする
	 */
	function setSegment($m)
	{
		// セグメントキーに対して処理を行う
		foreach($this->segment_keys as $v){
			// パラメタがある場合は「1」
			$key = $v.'_status';
			if($this->af->get($key)){
				$m->set($key, 1);
			}
			// パラメタがない場合は「0」
			else{
				$m->set($key, 0);
			}
			// パラメタをセットする
			$m = $this->setSegmentParam($m, $v);
			$this->af = $this->setSegmentParam($this->af, $v);
		}
		// 11. ポイント（インポート済み）
		if(!$this->af->get('user_point_status')){
			$m->set('user_point_status', 0);
		}
		// 12. 年齢（インポート済み）
		if(!$this->af->get('user_age_status')){
			$m->set('user_age_status', 0);
		}
		// 13. 登録期間
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
	 * セグメントユーザリストを取得する
	 *
	 */
	function getSegmentUser($segment_id='')
	{
		$um = $this->backend->getManager('Util');
		
		// セグメントIDの指定がある場合
		if($segment_id){
			$s = new Tv_Segment($this->backend, 'segment_id', $segment_id);
			$s->exportform();
		}
		
		// DBに接続する
		$db = $this->backend->getDB();
		
		// メール送信ユーザリストの取得
		$sqlValues = array();
		$sqlWhere = "user_status = 2 AND user_magazine_error_num < " . $this->config->get('mail_error_count') ." AND user_mail_ok = 1";
		foreach($this->segment_keys as $v){
			// セグメント取得のステータスがあり、パラメタが存在する場合のみ該当ブロックのSQL文を生成する
			if($this->af->get($v . '_status') && $this->af->get($v) != ""){
				$sqlWhere = $this->setSqlSegment($sqlWhere, $v);
			}
		}
		// 11. ポイント（エクスポート済み）
		if($this->af->get('user_point_status')){
			$start_point = $this->af->get('segment_point_min');
			$end_point = $this->af->get('segment_point_max');
			if($start_point != 0 && $end_point != 0){
				$sqlValues[] = $start_point;// 小
				$sqlValues[] = $end_point;// 大
				$sqlWhere .= " AND user_point >= ?";// 小
				$sqlWhere .= " AND user_point <= ?";// 大
			}
		}
		// 12. 年齢（エクスポート済み）
		if($this->af->get('user_age_status')){
			$start_age = $this->af->get('user_age_min');
			$end_age = $this->af->get('user_age_max');
			if($start_age != 0 && $end_age != 0){
				$start_age = $um->getBirthday($start_age);
				$end_age = $um->getBirthday($end_age);
				// 最大日
				$sqlValues[] = $start_age['over'];
				// 最小日
				$sqlValues[] = $end_age['under'];
				$sqlWhere .= " AND user_birth_date <= ?";// 西暦大、年齢小
				$sqlWhere .= " AND user_birth_date >= ?";// 西暦小、年齢大
			}
		}
		// 13. 登録期間
		if($this->af->get('user_created_status')){
			// フォーム経由の場合
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
			// DB経由の場合
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
		// 購入したことのある商品で検索する場合はcart,item,user_orderテーブルを見に行くのでこうする
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
	 * オブジェクトにパラメタをセットする
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
			// セット
			$m->set($k, $value);
		}else{
			// セット
			$m->set($k, "");
		}
		return $m;
	}
	
	/**
	 * オブジェクトに分解したパラメタをセットする
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
			// セット
			$this->af->set($k, $value);
		}
		return $this->af;
	}
	
	/**
	 * 分解したパラメタからSQL条件を作る
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
			// セット
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
	
	/**
	 * 配列パラメタからSQL条件を作る
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
			// セット
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
}

/**
 * セグメントオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Segment extends Ethna_AppObject
{
}
?>