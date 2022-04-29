<?php
/**
 * Tv_Segment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �Z�O�����g�}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SegmentManager extends Ethna_AppManager
{
	/* var �Z�O�����g�L�[ */
	var $segment_keys = array(
		// 1. �L�����A
		'user_carrier',
		// 2. ����
		'user_sex',
		// 3. �Z��
		'prefecture_id',
		// 4. �E��
		'job_family_id',
		// 5. �Ǝ�
		'business_category_id',
		// 6. ����
		'user_is_married',
		// 7. �q��
		'user_has_children',
		// 8. ���t�^
		'user_blood_type',
		// 9. �Ζ��n
		'work_location_prefecture_id',
		// 10. �o�^��
		'user_created',
	);
	
	/**
	 * �Z�O�����g�L�[��ԋp����
	 */
	function getSegmentKeys()
	{
		return $this->segment_keys;
	}
	
	/**
	 * �I�u�W�F�N�g�ɃZ�O�����g�p�����^���Z�b�g����
	 */
	function setSegment($m)
	{
		// �Z�O�����g�L�[�ɑ΂��ď������s��
		foreach($this->segment_keys as $v){
			// �p�����^������ꍇ�́u1�v
			$key = $v.'_status';
			if($this->af->get($key)){
				$m->set($key, 1);
			}
			// �p�����^���Ȃ��ꍇ�́u0�v
			else{
				$m->set($key, 0);
			}
			// �p�����^���Z�b�g����
			$m = $this->setSegmentParam($m, $v);
			$this->af = $this->setSegmentParam($this->af, $v);
		}
		// 11. �|�C���g�i�C���|�[�g�ς݁j
		if(!$this->af->get('user_point_status')){
			$m->set('user_point_status', 0);
		}
		// 12. �N��i�C���|�[�g�ς݁j
		if(!$this->af->get('user_age_status')){
			$m->set('user_age_status', 0);
		}
		// 13. �o�^����
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
	 * �Z�O�����g���[�U���X�g���擾����
	 *
	 */
	function getSegmentUser($segment_id='')
	{
		$um = $this->backend->getManager('Util');
		
		// �Z�O�����gID�̎w�肪����ꍇ
		if($segment_id){
			$s = new Tv_Segment($this->backend, 'segment_id', $segment_id);
			$s->exportform();
		}
		
		// DB�ɐڑ�����
		$db = $this->backend->getDB();
		
		// ���[�����M���[�U���X�g�̎擾
		$sqlValues = array();
		$sqlWhere = "user_status = 2 AND user_magazine_error_num < " . $this->config->get('mail_error_count');
		foreach($this->segment_keys as $v){
			// �Z�O�����g�擾�̃X�e�[�^�X������A�p�����^�����݂���ꍇ�̂݊Y���u���b�N��SQL���𐶐�����
			if($this->af->get($v . '_status') && $this->af->get($v)){
				$sqlWhere = $this->setSqlSegment($sqlWhere, $v);
			}
		}
		// 11. �|�C���g�i�G�N�X�|�[�g�ς݁j
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
		// 12. �N��i�G�N�X�|�[�g�ς݁j
		if($this->af->get('user_age_status')){
			$start_age = $this->af->get('user_age_min');
			$end_age = $this->af->get('user_age_max');
			if($start_age != 0 && $end_age != 0){
				$start_age = $um->getBirthday($start_age);
				$end_age = $um->getBirthday($end_age);
				$sqlValues[] = $start_age['under'];
				$sqlValues[] = $end_age['over'];
				$sqlWhere .= " AND user_birth_date <= ?";// �����A�N�
				$sqlWhere .= " AND user_birth_date >= ?";// ����A�N���
			}
		}
		// 13. �o�^����
		if($this->af->get('user_created_status')){
			// �t�H�[���o�R�̏ꍇ
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
			// DB�o�R�̏ꍇ
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
		$sql = "SELECT * FROM user WHERE  {$sqlWhere}";
		$rows = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);

//debug
//print $sql;
//print_r($sqlValues);
//$data = "";
//foreach($rows as $v){ $data .= $v['user_id'] . "\n";}
//$data = $rows->getDebugInfo();
//mail("kazuya.fujimori@gmail.com", "seg", $data, "From:info@euphee.com");
//mail("ebisawa@technovarth.co.jp", "seg", $data, "From:info@euphee.com");

		return $rows;
	}
	
	/**
	 * �I�u�W�F�N�g�Ƀp�����^���Z�b�g����
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
			// �Z�b�g
			$m->set($k, $value);
		}else{
			// �Z�b�g
			$m->set($k, "");
		}
		return $m;
	}
	
	/**
	 * �I�u�W�F�N�g�ɕ��������p�����^���Z�b�g����
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
			// �Z�b�g
			$this->af->set($k, $value);
		}
		return $this->af;
	}
	
	/**
	 * ���������p�����^����SQL���������
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
			// �Z�b�g
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
	
	/**
	 * �z��p�����^����SQL���������
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
			// �Z�b�g
			if($value != "") $sqlWhere .= $value . ") ";
		}
		return $sqlWhere;
	}
}

/**
 * �Z�O�����g�I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Segment extends Ethna_AppObject
{
}
?>