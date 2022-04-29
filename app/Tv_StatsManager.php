<?php
/**
 * Tv_Stats.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���ץޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_StatsManager extends Ethna_AppManager
{
	/**
	 * ����DB��INSERT����
	 * ����®�ٸ���Τ��ᡢ�֥ơ��֥��¸�߳�ǧ�פȡ֥���INSERT�פΤ߹Ԥ�
	 * @param
	 * $type
	 *		access[class_name�ʾ�ά�ġ�]�����̥ץ�ե�����ؤΥ��֥ݥ���ɬ��
	 *		blog[user_id]
	 *		blog_article[blog_article_id]�����إץ�ե�����ؤΥ��֥ݥ��Ȥ�ɬ�פ���
	 *		community[community_id]
	 *		community_article[community_article]�����إץ�ե�����ؤΥ��֥ݥ��Ȥ�ɬ�פ���
	 *		[��cron��]ad[ad_id]
	 *		[��cron��]banner[banner_id]
	 *		[��cron��]media[media_id]
	 *		image[image_id]��������α
	 *		movie[movie_id]��������α
	 *		avatar[avatar_id]
	 *		decomail[decomail]
	 *		game[game_id]
	 *		sound[sound_id]
	 * $id ID�ʼ�˥ץ饤�ޥꥭ���������
	 * $sub_id ����ID�ʼ�˥��ƥ���ID�������
	 * $status ���ơ�����
	 * @return true/false
	 *	2. ���Υ��󥵡���
	 */
	function addStats($type='access',$id=0,$sub_id=0,$status=0)
	{
		// ��������μ���
		$stats_type = $this->getStatsType();
		
		// [type]�̽�����Ԥ�
		switch($type)
		{
			// ���������ξ��
			case 'access':
				// [id]���饹̾���������
				foreach($this->backend->controller->action as $key => $value) {
					$action_name = $this->backend->controller->action[$key]['class_name'];
					break;
				}
				// ���������̾�������Ǥ��ʤ����Ͻ�����λ
				if(!$action_name) return false;
				
				// ������������INSERT
				$this->_addStats($type, $action_name);
				
				// ���֥ݥ��Ȥ�ɬ�פ��ɤ���Ƚ�̤���
				$receive = array(
					'blog'				=> '/Tv_Action_UserBlog*/',
					'blog_article'		=> '/^Tv_Action_UserBlogArticleView/',
					'community'			=> '/^Tv_Action_UserCommunity*/',
					'community_article'	=> '/^Tv_Action_UserCommunityArticleView/',
					'itemview'			=> '/^Tv_Action_Item/',
					'contents'			=> '/Tv_Action_UserContents*/',
				);
				foreach($receive as $k => $v){
					// ���˳���������
					if(preg_match($v, $action_name)){
						// ���֥ݥ��Ȥ�Ԥ�
						$this->_addStats($k, $this->_getId($k));
					}
				}
				break;
			// ����¾�ξ��
			default:
				// ����INSERT�����[id][sub_id]���ѿ��ν���ͤ���Ѥ����
				$this->_addStats($type, $id, $sub_id, $status);
				break;
		}
	}
	
	/**
	 * [id]��[name]���б������뤿����ɲä��븡�����
	 * @param type [type]
	 * @param table_name
	 * @param sqlSelect
	 * @param sqlWhere
	 * @return array(table_name, sqlSelect, sqlWhere)
	 */
	function addSqlIdName($type, $table_name, $sqlSelect, $sqlWhere)
	{
		// [type]�̤�[base]_[ext]���������
		list($base, $ext) = $this->_getIdBase($type);
		// �ơ��֥���ɲ�
		$table_name = DB_SNSV_STATS.".{$table_name},".DB_SNSV.".{$base} as base";
		// SELECT����ɲ�
		if($type=='invite'){
			$sqlSelect[] = "base.{$ext} as name";
		}else{
			$sqlSelect[] = "base.{$base}_{$ext} as name";
		}
		// WHERE����ɲ�
		if($type=='invite'){
			$sqlWhere[] = "id = base.from_user_id";
		}else{
			$sqlWhere[] = "id = base.{$base}_id";
		}
		
		return array($table_name, $sqlSelect, $sqlWhere);
	}
	
	/**
	 * [type]�̤�[id]���б�����[base]_[ext]���������
	 * @param type [type]
	 * @return array([base], [$ext])
	 */
	function _getIdBase($type)
	{
		// [type]�̤˽�����ʬ������
		switch($type){
			// blog�ξ��
			case 'blog':
				$base = 'user';
				$ext = 'nickname';
				break;
			// blog_article�ξ��
			case 'blog_article':
				$base = 'blog_article';
				$ext = 'title';
				break;
			// community�ξ��
			case 'community':
				$base = 'community';
				$ext = 'title';
				break;
			// community_article�ξ��
			case 'community_article':
				$base = 'community_article';
				$ext = 'title';
				break;
			// banner�ξ��
			case 'banner':
				$base = 'banner';
				$ext = 'body';
				break;
			// image�ξ��
			case 'image':
				$base = 'image';
				$ext = 'o';
				break;
			// movie�ξ��
			case 'movie':
				$base = 'movie';
				$ext = 'o';
				break;
			// contents�ξ��
			case 'contents':
				$base = 'contents';
				$ext = 'title';
				break;
			// invite�ξ��
			case 'invite':
				$base = 'invite';
				$ext = 'to_user_mailaddress';
				break;
			// ����¾�ξ��
			default:
				$base = $type;
				$ext = 'name';
				break;
		}
		return array($base, $ext);
	}
	
	/**
	 * [type]�̤�[id]���б�����[name]���������
	 * @param type [type]
	 * @param id [id]
	 * @return int id
	 */
	function getIdName($type, $id)
	{
		// access�ξ��
		if($type == 'access'){
			$alm = $this->backend->getManager('ActionList');
			$al = $alm->getActionList();
			// ���������̾���������
			if(array_key_exists($id, $al)) return $al[$id];
		}
		// ����¾�ξ��
		else{
			// �������꤬������������ؿ���¹�
			list($base, $ext) = $this->_getIdBase($type);
			if($base && $id && $ext){
				return $this->_getIdName($base, $id, $ext);
			}
		}
		
		return $id;
	}
	
	/**
	 * ��getIdName�������ؿ���[type]�̤�[id]���б�����[name]���������
	 * @param base ���饹�ʤɤΥ١����Ȥʤ�ʸ����
	 * @param id [id]
	 * @param ext ���̻�
	 * @return name [name]
	 */
	function _getIdName($base, $id, $ext)
	{
		// �����饤��
		$um = $this->backend->getManager('Util');
		$Type = $um->camelize($base);
		$class = "Tv_{$Type}";
		// �쥳���ɼ���
		$o = new $class($this->backend, "{$base}_id", $id);
		// ͭ���ʥ쥳���ɤʾ��
		if($o->isValid()) return $o->get("{$base}_{$ext}");
		
		return $id;
	}
	
	/**
	 * ��getID�������ؿ���[type]�̤�[id]���������
	 * @param type [type]
	 * @return int id
	 */
	function _getId($type)
	{
		// [type]�̤ν�����Ԥ�
		switch($type)
		{
			// blog�ξ��
			case 'blog':
				$id = $this->__getId($type, 'user');
				break;
			// community�ξ��
			case 'community':
				$id = $this->__getId($type, 'community');
				break;
			case 'contents':
				$id = $this->__getId($type, 'contents');
				break;
			// ����¾�ξ��
			default:
				$id = $_REQUEST["{$type}_id"];
				break;
		}
		
		if($id){
			return $id;
		}else{
			return 0;
		}
	}
	
	/**
	 * ��_getId�������ؿ���[type]�̤�[id]���������
	 * @param type [type]
	 * @param base ����������[id]�Υ���
	 * @return int id
	 */
	function __getId($type, $base)
	{
		// [base]_id������Ф�����ֵ�
		if($_REQUEST["{$base}_id"]){
			return $_REQUEST["{$base}_id"];
		}
		// [type]_article_id������Ф���򸵤�user_id���ֵ�
		if($_REQUEST["{$type}_article_id"]){
			// �����饤��
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}Article";
			// �쥳���ɼ���
			$o = new $class($this->backend, "{$type}_article_id", $_REQUEST["{$type}_article_id"]);
			// ͭ���ʥ쥳���ɤʾ��
			if($o->isValid()) return $o->get("{$base}_id");
		}
		// [type]_comment_id������Ф���򸵤�user_id���ֵ�
		if($_REQUEST["{$type}_comment_id"]){
			// �����饤��
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}Comment";
			$c = new $class($this->backend, "{$type}_comment_id", $_REQUEST["{$type}_comment_id"]);
			// ͭ���ʥ쥳���ɤʾ��
			if($c->isValid()){
				$class = "Tv_{$Type}Article";
				$a = new $class($this->backend, "{$type}_article_id", $c->get("{$type}_article_id"));
				if($a->isValid()) return $a->get("{$base}_id");
			}
		}
		// contents�ξ��ϥ����ɤ����Τ��б�����contents_id����������ֵѤ���
		if($_REQUEST["code"]){
			// �����饤��
			$um = $this->backend->getManager('Util');
			$Type = $um->camelize($type);
			$class = "Tv_{$Type}";
			// �쥳���ɼ���
			$o = new $class($this->backend, "{$type}_code", $_REQUEST["code"]);
			// ͭ���ʥ쥳���ɤʾ��
			if($o->isValid()) return $o->get("{$base}_id");
		}
		return 0;
	}
	
	/**
	 * �������ؿ��˥���DB��INSERT����
	 * @param type
	 * @param id
	 * @param sub_id
	 * @param status
	 * @return true/false
	 */
	function _addStats($type, $id=0, $sub_id=0, $status=0)
	{
		// [type]���ʤ����Ͻ�����λ
		if(!$type) return false;
		
		// �����Ǽ����ơ��֥�����
		$table = "stats_{$type}";
		
		// �ơ��֥뤬¸�ߤ��ʤ���н�����λ����
		if(!$this->isTableExists($table)) return false;
		
		// DB����³����
		$db = $this->backend->getDB('stats');
		// ��¸����ǡ����򥻥åȤ���
		$values = array();
		// [id]�������祻�å�
		if($id) $values['id'] = $id;
		// [sub_id]�������祻�å�
		if($sub_id) $values['sub_id'] = $sub_id;
		// �桼��ID�������祻�å�
		$user = $this->session->get('user');
		if($user['user_id']) $values['user_id'] = $user['user_id'];
		// ���ơ������������祻�å�
		if($status) $values['status'] = $status;
		// ��������Υ��å�
		$values['datetime'] = date('Y-m-d H:i:s');
		// INSERT
		$r = $db->db->autoExecute($table, $values, DB_AUTOQUERY_INSERT);
//foreach($this->backend->db_list as $a)echo($a->db->last_query);
		// ���顼����
//		if(PEAR::isError($r)) print $r->getDebugInfo();
		if(PEAR::isError($r)) return false;
		
		return true;
	}
	
	/**
	 * ���Υ��ơ�������Ԥ�
	 */
	function rotateStats($type, $term)
	{
		// ��ư����ؿ�̾�����
//		$um = $this->backend->getManager('Util');
//		$Term = $um->camelize($term);
//		$function = "_rotateStats{$Term}";
		$function = "_rotateStats";
		if(!method_exists($this, $function)) return false;
		
		// [type]�̤˽�����ʬ������
		switch($type)
		{
			case 'all':
				$stats_type = $this->getStatsType();
				foreach($stats_type as $k => $v){
					if($k){
						$this->$function($k, $term);
					}
				}
				break;
			default:
				$this->$function($type, $term);
		}
	}
	
	/**
	 * ��rotateStats�������ؿ��˥��Υ��ơ�������Ԥ�
	 */
	function _rotateStats($type, $term)
	{
		/* =============================================
		// �ơ��֥��¸�߳�ǧ��¸�ߤ��ʤ����ϥơ��֥����������
		 ============================================= */
		// DB����³����
		$db = & $this->backend->getDB('stats');
		$sql = $this->getCreateTable($type, $term);
		$r = $db->db->query($sql);
		
		/* =============================================
		// ��ơ��֥뤫���SELECT��
		 ============================================= */
		$um =& $this->backend->getManager('Util');
		// ��³��DB�����
		$db_key = $this->getDbKey($type, $term);
		// ���򥫥������
		$sqlSelect = $this->getSqlSelect($type, $term);
		// ����ơ��֥�����
		$sqlFrom = $this->getTableName($type, $term, -1);
		// �����������
		list($sqlWhere, $sqlValues) = $this->getSqlCondition($type, $term);
		// ���򥰥롼�פ����
		$sqlGroup = $this->getSqlGroup($type, $term);
		$param = array(
			'db_key'		=> $db_key,
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> $sqlFrom,
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_group'		=> $sqlGroup,
		);
		$r = $um->dataQuery($param);
		
//print_r($param);
//foreach($this->backend->db_list as $a)echo($a->db->last_query)."\n";
//if(PEAR::isError($r)){
//	print $r->getDebugInfo();exit;
//}else{
//	print_r($r);
//}
		// ���̤˽��׽�����ɬ�פ�����ϹԤ�
		if(in_array($type, array('ad','banner','media','invite','item')) && in_array($term ,array('hour','day'))){
			// ����
			$sql_score = $this->getSqlScore($type);
			$score_status = $this->getScoreStatus($type);
			$_r = array();
			$__r = array();
			// ���٤Ƥη�̥쥳���ɤ��Ф��ƽ�����Ԥ�
			foreach($r as $k => $v){
				foreach($score_status as $i => $ss){
					// ���פ��륹�ơ��������ɤ���Ƚ��
					if($v['status'] == $ss){
						// ���˥�����Ȥ�������
						if($_r[$v['id']][$sql_score[$i]]){
							$_r[$v['id']][$sql_score[$i]] = intval($_r[$v['id']][$sql_score[$i]])+1;
						}
						// ���˥�����Ȥ��ʤ����
						else{
							$_r[$v['id']][$sql_score[$i]] = 1;
						}
						// invite
						//$_r[$v['id']]['sub_id'] = $v['sub_id'];
					}
				}
			}
			// ���������������쥳���ɤ���������
			foreach($_r as $k => $v){
				$t = array('id' => $k);
				if(is_array($v)){
					foreach($v as $k => $v){
						$t[$k] = $v;
					}
				}
				$__r[] = $t;
			}
			$r = $__r;
		}
//print_r($r);
		
		/* =============================================
		// ��SELECT�פ����ǡ��������INSERT���ѤΥǡ���������
		 ============================================= */
		$timestamp = date("Y-m-d H:i:s");
		// �ơ��֥�̾�����
		$table_name = $this->getTableName($type, $term, 0);
		// INSERT���KEY������
		$insert_keys = "`datetime`, `id`, `sub_id`, `created_time`";
		// INSERT���륫��������
		$insert_columns = $this->getSqlScore($type);
		// [type]��[term]�̤��Ѱդ��륫�����������
		$insert_column = implode(',', $insert_columns);
		if($insert_column) $insert_keys .= ", {$insert_column}";
		$sql = "INSERT INTO {$table_name} ({$insert_keys}) VALUES ";
		// ���٤Ƥν��ץǡ������Ф��ƽ�����Ԥ�
		list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
		foreach($r as $k => $v){
			// ���ܤ�VALUE���Ѱ�
			$value = "'" . $start_time . "', '" . $v['id'] . "', '" . $v['sub_id'] . "', '" . $timestamp ."'";
			// [type]��[term]�̤��Ѱդ���VALUE���������
			foreach($insert_columns as $k => $j){
				$value .= ", " . intval($v[$j]);
			}
			// ξ�Ԥ�����
			$insertValues[] = "({$value})";
		}
		/* =============================================
		// ���ơ��֥�ˡ�INSERT��
		 ============================================= */
		// INSERT�ѤΥǡ�����������
		if(is_array($insertValues)){
			$sql .= implode(',', $insertValues) . ";";
			$r = $db->db->query($sql);
//print "\n".$sql."\n";
//if(PEAR::isError($r)) print $r->getDebugInfo();
		}
		
		/* =============================================
		// ��INSERT�ơ��֥�פ��鳺���ǡ����Ρ�DELETE�פ�Ԥ�
		 ============================================= */
		if($term == 'day'){
			// cron�Ϥ�[type]�ν����ϹԤ�ʤ�
			if($type == 'media' || $type == 'invite') return true;
			// ����¹�
			$sql = "DELETE from stats_{$type} WHERE datetime >= '" . $start_time . "' AND datetime <= '" . $end_time . "'";
			$r = $db->db->query($sql);
//if(PEAR::isError($r)) print $r->getDebugInfo();
		}
		
		return true;
	}
	
	/**
	 * // [type]��[term]�̤˸��������������
	 */
	function getSqlCondition($type, $term)
	{
		// �����ϩ�ξ��
//		if($type == 'media' && in_array($term, array('hour', 'day'))){
//				$sql_score = $this->getSqlScore($type);
//				$sqlWhere = 'access_time >= ? AND access_time <=?';// mail regist send ����α
//				list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
//				$sqlValues[] = $start_time;
//				$sqlValues[] = $end_time;
		// ͧã���Ԥξ��
//		}else 
//		if($type == 'invite' && in_array($term, array('hour', 'day'))){
//				$sql_score = $this->getSqlScore($type);
//				$sqlWhere = 'mail_time >= ? AND mail_time <=?';// mail regist send ����α
//				list($start_time, $end_time) = $this->getSqlPeriod($type, $term);
//				$sqlValues[] = $start_time;
//				$sqlValues[] = $end_time;
		// ����¾�ξ��
//		}else{
			$sqlWhere = 'datetime >= ? AND datetime <= ?';
			list($start_time, $end_time) = $this->getSqlPeriod($term, $term);
			$sqlValues[] = $start_time;
			$sqlValues[] = $end_time;
//		}
		return array($sqlWhere, $sqlValues);
	}
	
	
	/**
	 * GROUP BY���������
	 */
	function getSqlGroup($type, $term)
	{
		if(in_array($type, array('ad','banner','media','invite','item')) && in_array($term, array('hour', 'day'))){
			return '';
		}else{
			return 'id';
		}
//		$stats_type = $this->getStatsType();
//		return $stats_type[$type]['sql_group'];
	}
	
	/**
	 * [score]Ƚ���ѤΥ��ơ��������������
	 */
	function getScoreStatus($type)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['score_status'])) return array();
		return $stats_type[$type]['score_status'];
	}
	
	/**
	 * [score]�ѤΥ������������
	 */
	function getSqlScore($type)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['sql_score'])) return array();
		return $stats_type[$type]['sql_score'];
	}
	
	/**
	 * ORDER BY���������
	 */
	function getSqlOrder($type)
	{
		$stats_type = $this->getStatsType();
		return $stats_type[$type]['sql_order'];
	}
	
	/**
	 * SQLȯ�Ի��δ��־����������
	 */
	function getSqlPeriod($type, $term)
	{
		$um = $this->backend->getManager('Util');
		$start_time = "";
		$end_time = "";
		// [term]�̤˽�����ʬ������
		switch($term)
		{
			case 'year':
					$timestamp = $um->getPreDate('year',-1);
					$start_time	= date("Y-01-01 00:00:00", $timestamp);
					$end_time	= date("Y-12-31 23:59:59", $timestamp);
					break;
			case 'month':
					$timestamp = $um->getPreDate('month',-1);
					$start_time	= date("Y-m-01 00:00:00", $timestamp);
					$end_time	= date("Y-m-t 23:59:59", $timestamp);
					break;
			case 'day':
					$timestamp = $um->getPreDate('day',-1);
					$start_time	= date("Y-m-d 00:00:00", $timestamp);
					$end_time	= date("Y-m-d 23:59:59", $timestamp);
					break;
			case 'hour':
					$timestamp = $um->getPreDate('hour',-1);
					$start_time	= date("Y-m-d H:00:00", $timestamp);
					$end_time	= date("Y-m-d H:59:59", $timestamp);
					break;
			default:
					break;
		}
		return array($start_time, $end_time);
	}
	
	/**
	 * SQLȯ�Ի������򥫥����������
	 */
	function getSqlSelect($type, $term)
	{
		$stats_type = $this->getStatsType();
		if(!is_array($stats_type[$type]['sql_select'][$term])) return ;
		return implode(',', $stats_type[$type]['sql_select'][$term]);
	}
	
	/**
	 * �ơ��֥��¸�߳�ǧ��Ԥ�
	 * @param table
	 * @return true/false
	 */
	function isTableExists($table)
	{
		// DB����³
		$db = $this->backend->getDB('stats');
		
		// �����꡼����������
		$sql = "SHOW TABLES ";
		$r = $db->db->getAll($sql, null, DB_FETCHMODE_ASSOC);
		$array = explode('/',$this->config->get('dsn_stats'));
		$db_name = $array[count($array)-1];
		
		// �ơ��֥��¸��Ƚ���Ԥ�
		$flg = false;
		foreach($r as $p){
			if( $p["Tables_in_{$db_name}"] == $table ){
				$flg = true;
				break;
			}
		}
		
		return $flg;
	}
	
	/**
	 * �ơ��֥��CREATEʸ����������
	 * @param type [type]
	 * @param term [term]
	 */
	function getCreateTable($type, $term)
	{
		// �ơ��֥�̾���������
		$table_name = $this->getTableName($type, $term, 0);
		
		// [score]���¬���륫������������
		$stats_type = $this->getStatsType();
		$count_column = $stats_type[$type]['count'];
		// ���꤬�ʤ����Ͻ�����λ����
		if(!$count_column) return false;
		$count_columns = "";
		if(is_array($count_column)){
			foreach($count_column as $v){
				$count_columns .= $v .",";
			}
		}
		
		// ��CREATE��ʸ������
		if($type == 'access' ){ //|| $type == 'invite'){
			$id_column = "id varchar(255) NOT NULL,";
		}else{
			$id_column = "id int(11) NOT NULL default 0,";
		}
		$sql = 
			"CREATE TABLE IF NOT EXISTS {$table_name} (" .
			"stats_id int(11) NOT NULL auto_increment," .
			$id_column .
			"sub_id int(11) NOT NULL default 0," .
			"datetime datetime NOT NULL," .
			$count_columns .
			"created_time datetime NOT NULL," .
			" PRIMARY KEY  (stats_id)" .
			" ) ENGINE=InnoDB ";
		
		return $sql;
	}
	
	/**
	 * ��³��DB���������
	 */
	function getDbKey($type, $term)
	{
		// cron�Ϥξ��
//		if($type == 'invite' && in_array($term, array('hour', 'day'))
			//|| $type == 'media' && in_array($term, array('hour', 'day'))
//		){
//			$db_key = '';
//		}else{
			$db_key = 'stats';
//		}
		return $db_key;
	}
	
	/**
	 * �ơ��֥��̾���ֵѤ���
	 * @param type [type]
	 * @param term [term]
	 * @param decade ������֡�0:���λ����ӤΤ�Ρ�-1:�ҤȤ����λ����ӤΤ�Ρ�
	 * @return table
	 */
	function getTableName($type, $term, $decade=0)
	{
		$table_name = "";
		// [type]�̤˽�����ʬ������
		switch($term)
		{
			// ��ñ�̤ξ��
			case 'hour':
				// ���λ�����
				if($decade === 0){
					$table_name = sprintf("stats_%s_hour_%s", $type, date("Y_m"));
				}
				// �Τλ�����
				else{
					// cron�Ϥξ��
					//if($type == 'media'){
					//	$table_name = "{$type}_access";
					//}else 
					//if($type == 'invite'){
					//	$table_name = "invite";
					//}else{
						$table_name = "stats_{$type}";
					//}
				}
				break;
			// ��ñ�̤ξ��
			case 'day':
				// ���λ�����
				if($decade === 0){
					$table_name = sprintf("stats_%s_day_%s", $type, date("Y"));
				}
				// �Τλ�����
				else{
					// cron�Ϥξ��
					//if($type == 'media'){
					//	$table_name = "{$type}_access";
					//}else 
					//if($type == 'invite'){
					//	$table_name = "invite";
					//}else{
						$table_name = "stats_{$type}";
					//}
				}
				break;
			// ��ñ�̤ξ����ü��
			case 'week':
				// ���ߤ�1��ʤ���ΤΥǡ�������ǯ�Υơ��֥��¸�ߤ�����ǯ�Υǡ�������ǯ�Υơ��֥��¸�ߤ����ǽ��������
				$year = date("Y");
				$um = $this->backend->getManager('Util');
				$table_name = sprintf("stats_%s_day_%s", $type, $year);
				if(intval(date("m")) == 1){
					$um = $this->backend->getManager('Util');
					$_table_name = sprintf("stats_%s_day_%s", $type, $um->getPreDate('year', -1));
					return array($table_name, $_table_name);
				}else{
					return $table_name;
				}
				break;
			// ��ñ�̤ξ��
			case 'month':
				// ���λ�����
				if($decade === 0){
					$table_name = "stats_{$type}_month";
				}
				// �Τλ�����
				else{
					// ���ߤ�1��ʤ���ΤΥǡ�������ǯ�Υơ��֥��¸�ߤ���
					if(intval(date("m")) == 1){
						$um = $this->backend->getManager('Util');
						$table_name = sprintf("stats_%s_day_%s", $type, date("Y", $um->getPreDate('year', $decade)));
					}
					// ����¾�ξ��Ϻ�ǯ�Υơ��֥��¸�ߤ���
					else{
						$table_name = sprintf("stats_%s_day_%s", $type, date("Y"));
					}
				}
				break;
			// ǯñ�̤ξ��
			case 'year':
				// ���λ�����
				if($decade === 0){
					$table_name = "stats_{$type}_year";
				}
				// �Τλ�����
				else{
					$table_name = "stats_{$type}_month";
				}
				break;
			// ����¾�ξ��
			default:
					break;
		}
		return $table_name;
	
	}
	
	/*
	 * �����������������
	 *
	 */
	function getStatsType()
	{
		// ��������
		$stats_type = array(
			/* =============================================
			// 1. access
			 ============================================= */
			'access' => array(
				'name'	=> '��������',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view', 'uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			
			/* =============================================
			// 2. blog
			 ============================================= */
			'blog' => array(
				'name'	=> '�桼������',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 3. blog_article
			 ============================================= */
			'blog_article'	=> array(
				'name'	=> '����',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 4. community
			 ============================================= */
			'community'	=> array(
				'name'	=> '���ߥ�˥ƥ�',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 5. community_article
			 ============================================= */
			'community_article'	=> array(
				'name'	=> '���ߥ�˥ƥ��ȥԥå�',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 6. ad
			 ============================================= */
			'ad'	=> array(
				'name'	=> '����',
				'count'	=> array(
					'view int(11) NOT NULL default 0',
					'click int(11) NOT NULL default 0',
					'regist int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','click','regist'),
				'score_status'	=> array(1,2,3),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status',
				  	),
					'month' => array(
							'id',
							'view',
							'click',
							'regist',
				  	),
					'year' => array(
							'id',
							'view',
							'click',
							'regist',
				  	),
				 ),
			),
			/* =============================================
			// 7. banner
			 ============================================= */
			'banner'	=> array(
				'name'	=> '�Хʡ�',
				'count'	=> array(
					'view int(11) NOT NULL default 0',
					'click int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','click'),
				'score_status'	=> array(1,2),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status',
				  	),
					'month' => array(
							'id',
							'view',
							'click',
				  	),
					'year' => array(
							'id',
							'view',
							'click',
				  	),
				 ),
			),
			/* =============================================
			// 8. media
			 ============================================= */
			'media'	=> array(
				'name'	=> '�����ϩ',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'mail int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
						'send int(11) NOT NULL default 0',
						'resign int(11) NOT NULL default 0',
						'buy int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access','mail','regist','send','resign','buy'),
				'score_status'	=> array(0,1,2,3,4,5),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status', 
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'access',
							'mail',
							'regist',
							'send',
							'resign',
							'buy',
				  	),
					'year' => array(
							'id',
							'access',
							'mail',
							'regist',
							'send',
							'resign',
							'buy',
				  	),
				 ),
			),
			/* =============================================
			// 9. avatar
			 ============================================= */
			'avatar'	=> array(
				'name'	=> '���Х���',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 10. decomail
			 ============================================= */
			'decomail'	=> array(
				'name'	=> '�ǥ��᡼��',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'sub_id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'sub_id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'sub_id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'sub_id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 11. game
			 ============================================= */
			'game'	=> array(
				'name'	=> '������',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 12. sound
			 ============================================= */
			'sound'	=> array(
				'name'	=> '�������',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 13. image
			 ============================================= */
			'image'	=> array(
				'name'	=> '����',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 14. movie
			 ============================================= */
			'movie'	=> array(
				'name'	=> 'ư��',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'dl int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('dl','uu'),
				'sql_order'		=> 'dl DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS dl', 
				  	),
					'month' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
					'year' => array(
							'id',
							'MAX( dl ) AS dl',
				  	),
				 ),
			),
			/* =============================================
			// 15. contents
			 ============================================= */
			'contents'	=> array(
				'name'	=> '�ե꡼�ڡ���',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
			/* =============================================
			// 16. invite
			 ============================================= */
			 /*
			'invite'	=> array(
				'name'	=> 'ͧã�Ҳ�',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'mail int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access','mail','regist'),
				'score_status'	=> array(0,1,2),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'to_user_mailaddress as id',
							'from_user_id as sub_id',
							'invite_status  as status', 
				  	),
					'day' => array(
							'to_user_mailaddress as id',
							'from_user_id as sub_id',
							'invite_status  as status', 
				  	),
					'month' => array(
							'id',
							'sub_id',
							'access',
							'mail',
							'regist',
				  	),
					'year' => array(
							'id',
							'sub_id',
							'access',
							'mail',
							'regist',
				  	),
				 ),
			),
			*/
			/* =============================================
			// 18. invite
			 ============================================= */
			'invite'	=> array(
				'name'	=> 'ͧã����',
				'count'	=> array(
						'mail int(11) NOT NULL default 0',
						'access int(11) NOT NULL default 0',
						'regist int(11) NOT NULL default 0',
				),
				// id�ˤ�ͧã���Ԥ�Ԥä��桼������user_id���Ǽ����
				'sql_score'		=> array('mail','access','regist'),
				'score_status'	=> array(0,1,2),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status', 
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'mail',
							'access',
							'regist',
				  	),
					'year' => array(
							'id',
							'mail',
							'access',
							'regist',
				  	),
				 ),
			),
			/* =============================================
			// 17. item
			 ============================================= */
/*
			'item'	=> array(
				'name'	=> '����',
				'count'	=> array(
					'uu int(11) NOT NULL default 0',
					'view int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('view','uu'),
				'sql_order'		=> 'view DESC',
				'sql_select'	=> array(
					'hour'		=> array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view',
				  	),
					'day' => array(
							'id',
							'COUNT( DISTINCT user_id ) AS uu',
							'COUNT( * ) AS view', 
				  	),
					'month' => array(
							'id',
							'MAX( view ) AS view',
				  	),
					'year' => array(
							'id',
							'MAX( view ) AS view',
				  	),
				 ),
			),
*/
			/* =============================================
			// 17. item
			 ============================================= */
			'item'	=> array(
				'name'	=> '����',
				'count'	=> array(
						'access int(11) NOT NULL default 0',
						'buy int(11) NOT NULL default 0',
				),
				'sql_score'		=> array('access', 'buy'),
				'score_status'	=> array(0, 1),
				'sql_order'		=> 'access DESC',
				'sql_select'	=> array(
					'hour' => array(
							'id',
							'status',
				  	),
					'day' => array(
							'id',
							'status', 
				  	),
					'month' => array(
							'id',
							'access',
							'buy',
				  	),
					'year' => array(
							'id',
							'access',
							'buy',
				  	),
				 ),
			),
		);
		return $stats_type;
	}
}
?>