<?php
/**
 * Result.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������̲��̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSearchResult extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$condition = array(
			// �桼���˥å��͡��ม��
			'user_nickname' => array(
				'type' => 'LIKE',
			),
			// ǯ�𸡺�
			'user_age' => array(
				'type' => 'AGE',
				'column' => 'user_birth_date',
				'public' => true,
			),
//			// ���̸���
//			'user_sex' => array(
//				'type' => 'EQ',
//			),
			// ����(��ƻ�ܸ�)
			'prefecture_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// ��շ�
			'user_blood_type' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// ����
			'job_family_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// �ȼ�
			'business_category_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// �뺧
			'user_is_married' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// �Ҷ�
			'user_has_children' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// ��̳��
			'work_location_prefecture_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// ��̣
			'user_hobby' => array(
				'type' => 'LIKE',
				'public' => true,
			),
			// URL
			'user_url' => array(
				'type' => 'LIKE',
				'public' => true,
			),
			// ���ʾҲ�
			'user_introduction' => array(
				'type' => 'LIKE',
				'public' => true,
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// WHERE������
		$user_session = $this->session->get('user');
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= "user_status = 2 AND user_id <> {$user_session['user_id']}";
		
		// ���̸���
		if($this->af->get('user_sex') != 0){
			$sqlWhere .= " AND user_sex = ?";
			$sqlValues[] = $this->af->get('user_sex');
			$sqlWhere .= " AND user_sex_public = ?";
			$sqlValues[] = 1;
		}
		
		// ���ץ�������start
		$db = $this->backend->getDB();
		// ���ܤ��Ȥ�user_prof�ơ��֥�θ�����Ԥäƥ桼����ʤ����
		// ���쥯�ȥܥå���
		if(is_array($this->af->get('user_prof_select'))){
			foreach($this->af->get('user_prof_select') as $configUserProfId => $userProfValue){
				$option_sql_select_v = array();
				if($userProfValue != ''){
					$option_sql = ' SELECT user_id FROM user_prof WHERE config_user_prof_id = ? AND user_prof_value = ? ';
					$option_sql_select_v[] = $configUserProfId;
					$option_sql_select_v[] = $userProfValue;
					$option_rows = $db->db->getAll($option_sql, $option_sql_select_v, DB_FETCHMODE_ASSOC);
					$option_count = count($option_rows);
					$user_id_in = '';
					if($option_count){
						for($i = 0;$i < $option_count;$i++){
							$user_id_in .= $option_rows[$i]['user_id'];
							if($i != ($option_count - 1)){
								$user_id_in .= ',';
							}
						}
					}else{
						$user_id_in = ' NULL ';
					}
					$sqlWhere .= " AND user_id in ({$user_id_in})";
				}
			}
		} 
		// �饸���ܥ���
		if(is_array($this->af->get('user_prof_radio'))){
			foreach($this->af->get('user_prof_radio') as $configUserProfId => $userProfValue){
				$option_sql_radio_v = array();
				if(($userProfValue != '') && ($userProfValue != '0')){
					$option_sql = ' SELECT user_id FROM user_prof WHERE config_user_prof_id = ? AND user_prof_value = ? ';
					$option_sql_radio_v[] = $configUserProfId;
					$option_sql_radio_v[] = $userProfValue;
					$option_rows = $db->db->getAll($option_sql, $option_sql_radio_v, DB_FETCHMODE_ASSOC);
					$option_count = count($option_rows);
					$user_id_in = '';
					if($option_count){
						for($i = 0;$i < $option_count;$i++){
							$user_id_in .= $option_rows[$i]['user_id'];
							if($i != ($option_count - 1)){
								$user_id_in .= ',';
							}
						}
					}else{
						$user_id_in = ' NULL ';
					}
					$sqlWhere .= " AND user_id in ({$user_id_in})";
				}
			}
		} 
		// �����å��ܥå���
		if(is_array($this->af->get('user_prof_checkbox'))){
			foreach($this->af->get('user_prof_checkbox') as $configUserProfId => $userProfValue){
				$option_sql_check_v = array();
				$configUserProfOption = &new Tv_ConfigUserProfOption($this->backend,
					'config_user_prof_option_id',
					$userProfValue
					);
				$option_sql = ' SELECT user_id FROM user_prof WHERE config_user_prof_id = ? AND user_prof_value = ? ';
				$option_sql_check_v[] = $configUserProfOption->get('config_user_prof_id');
				$option_sql_check_v[] = $userProfValue;
				$option_rows = $db->db->getAll($option_sql, $option_sql_check_v, DB_FETCHMODE_ASSOC);
				$option_count = count($option_rows);
				$user_id_in = '';
				if($option_count){
					for($i = 0;$i < $option_count;$i++){
						$user_id_in .= $option_rows[$i]['user_id'];
						if($i != ($option_count - 1)){
							$user_id_in .= ',';
						}
					}
				}else{
					$user_id_in = ' NULL ';
				}
				$sqlWhere .= " AND user_id in ({$user_id_in})";
			}
		} 
		// �������
		if($this->af->get('user_prof_keyword') != ''){
			// ���ڡ������ڤ�ǥ�����ɤ�ʬ��
			$keyword = str_replace('��', ' ', $this->af->get('user_prof_keyword'));
			$keywordList = explode(' ', $keyword);
			$sqlKeyword = array();
			foreach($keywordList as $word){
				if($word){ // ���ڡ�����ʣ��Ϣ³�������Ϥ��줿�����θ
					$sqlKeyword[] = 'user_prof_value LIKE ? ';
					$sqloption_keyword_v[] = '%' . $word . '%';
				}
			}
			if(count($sqlKeyword)){
				$option_sql = 'SELECT user_id FROM user_prof, config_user_prof WHERE (' . implode(' AND ', $sqlKeyword) . ') AND user_prof.config_user_prof_id = config_user_prof.config_user_prof_id AND (config_user_prof_type = 1 OR config_user_prof_type = 2)';
				$option_rows = $db->db->getAll($option_sql, $sqloption_keyword_v, DB_FETCHMODE_ASSOC);
				$option_count = count($option_rows);
				$user_id_in = '';
				if($option_count){
					for($i = 0;$i < $option_count;$i++){
						$user_id_in .= $option_rows[$i]['user_id'];
						if($i != ($option_count - 1)){
							$user_id_in .= ',';
						}
					}
				}else{
					$user_id_in = ' NULL ';
				}
				$sqlWhere .= " AND user_id in ({$user_id_in})";
			}
		} 
		// ���ץ�������end
		// �ꥹ�ȥӥ塼
		$this->listview = array(
			'action_name'	=> 'user_search_do',
			'sql_select'	=> 'user_id, user_nickname,image_id',
			'sql_from'		=> 'user',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'user_id DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 10,
		);
		
		// hidden_vars
		$hidden_vars = $this->af->getHiddenVars(null,array('search'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>