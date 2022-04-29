<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����桼�������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserList extends Tv_ActionForm
{
	/** @var bool �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var array   �ե���������� */
	var $form = array(
		'user_id' => array(
			'name'		=> '�桼��ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_nickname' => array(
			'name'		=> '�˥å��͡���',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_mailaddress' => array(
			'name'		=> '�᡼�륢�ɥ쥹',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_min' => array(
			'name'		=> 'ǯ��(����)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'		=> 'ǯ��(�ǹ�)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_sex' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_mailaddress' => array(
			'name'		=> '�᡼�륢�ɥ쥹',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'prefecture_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_address' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_blood_type' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'job_family_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'business_category_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_is_married' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_has_children' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'work_location_prefecture_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_hobby' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_url' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_introduction' => array(
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
		'user_status' => array(
			'name'		=> '����',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_status',
		),
		'user_prof_checkbox' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_prof_keyword' => array(
			'name'		=> '�������',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// ��Ͽ����
		'user_created_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_created_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_created_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_created_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_created_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_created_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ��������
		'user_updated_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_updated_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_updated_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_updated_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_updated_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_updated_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// ������
		'user_deleted_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_deleted_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_deleted_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_deleted_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'user_deleted_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'user_deleted_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'user_carrier' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_carrier',
			'name'			=> '����ꥢ',
		),
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, media',
			'name'			=> '�����ϩ',
		),
		'user_device' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'name'		=> '����̾',
		),
		'download' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �����桼�������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserList extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'admin_user_list';
		
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// csv���������
		if($this->af->get('download')){
			$um = $this->backend->getManager('Util');
			
			// ������������
			$condition = array(
				// �桼��ID����
				'user_id' => array(
					'type' => 'EQ',
					'column' => 'user_id',
				),
				// �᡼�륢�ɥ쥹����
				'user_mailaddress' => array(
					'type' => 'LIKE',
					'column' => 'user_mailaddress',
				),
				// �桼���˥å��͡��ม��
				'user_nickname' => array(
					'type' => 'LIKE',
					'column' => 'user_nickname',
				),
				// ǯ�𸡺�
				'user_age' => array(
					'type' => 'AGE',
					'column' => 'user_birth_date',
				),
				// ���̸���
				/*
				'user_sex' => array(
					'type' => 'EQ',
					'column' => 'user_sex',
				),
				*/
				// �桼�����ơ���������
				'user_status' => array(
					'type' => 'EQ',
					'column' => 'user_status',
				),
				// ��Ͽ��������
				'user_created' => array(
					'type' => 'PERIOD',
					'column' => 'user_created_time',
				),
				// ������������
				'user_updated' => array(
					'type' => 'PERIOD',
					'column' => 'user_updated_time',
				),
				// �����������
				'user_deleted' => array(
					'type' => 'PERIOD',
					'column' => 'user_deleted_time',
				),
				// ����ꥢ
				'user_carrier' => array(
					'type' => 'EQ',
					'column' => 'user_carrier',
				),
				// ����̾
				'user_device' => array(
					'type' => 'LIKE',
					'column' => 'user_device',
				),
				// �����ϩ
				'media_id' => array(
					'type' => 'EQ',
					'column' => 'media_id',
				),
			);
			
			list($sqlWhere, $sqlValues) = $um->getDataCondition($condition);
			
			// �����å��ܥå����򥰥롼��ʬ�����Ƹ�������sql��
			foreach($this->af->getDef() as $key => $form){
				if($form['form_type'] == FORM_TYPE_CHECKBOX){
					if(is_array($this->af->get($key))){
						$subSqlWhere = '';
						foreach($this->af->get($key) as $value){
							if($subSqlWhere) $subSqlWhere.= ' OR ';
							$subSqlWhere .= $key . '=?';
							$sqlValues[] = $value;
							if(!$this->af->get($key.'_active')) $this->af->setApp($key.'_active', true);
						}
						if($sqlWhere) $sqlWhere .= ' AND ';
						$sqlWhere .= "({$subSqlWhere})";
					}
				}
			}
			
			// ���ץ�������start
			$db = $this->backend->getDB();
			// ���ܤ��Ȥ�user_prof�ơ��֥�θ�����Ԥäƥ桼����ʤ����
			// �����å��ܥå���
			$form = array_merge($_GET, $_POST);
			$checkbox = array();
			foreach($form as $k => $v){
				// ���ץ������ܤΤߤ����
				if(substr($k, 0, 19) == 'user_prof_checkbox_'){
					$checkbox[] = $v;
				}
			}
			
			$isChecked = array();
			if(count($checkbox)){
				foreach($checkbox as $groupedUserProfValue){
					$subSqlWhere = '';
					foreach($groupedUserProfValue as $userProfValue){
						$isChecked[$userProfValue] = true;
						
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
						if($subSqlWhere) $subSqlWhere .= ' OR ';
						$subSqlWhere .= "user_id in ({$user_id_in})";
					}
					if($sqlWhere) $sqlWhere .= ' AND ';
					$sqlWhere .= "({$subSqlWhere})";
				}
			}
			$this->af->setApp('is_checked', $isChecked);
			
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
					// ��������Ϳ
					if($sqlWhere) $sqlWhere .= ' AND ';
					$sqlWhere .= "user_id in ({$user_id_in})";
				}
			} 
			// ���ץ�������end
			
			// SQL�¹�
			$param = array(
				'sql_select'	=> ' * ',
				'sql_from'	=> ' user ',
				'sql_where'	=> $sqlWhere,
				'sql_order'	=> 'user_created_time DESC',
				'sql_values'	=> $sqlValues,
			);
			
			$rows = $um->dataQuery($param);
			//�ãӣָ��Ф��� �ޤ����Ф������
			// �᡼�륢�ɥ쥹�����̡���ǯ�������ϰ衢
			// ���������������������ơ������������ǥ���������ꥢ��ü��ID������̾
			// ��au�˴ؤ��ƤϥǥХ���ID��
			$title_array = array();
			$title_array[] = "�桼����ID";							//1
			$title_array[] = "�˥å��͡���";						//2
			$title_array[] = "�᡼�륢�ɥ쥹";						//3
			$title_array[] = "��Ͽ����";							//4
			$title_array[] = "��������";							//5
			$title_array[] = "������";							//6
			$title_array[] = "��ǯ����";							//7
			$title_array[] = "����";								//8
			$title_array[] = "����(��ƻ�ܸ�)";						//9
			$title_array[] = "��շ�";								//10
			$title_array[] = "�뺧";								//11
			$title_array[] = "��̳��";								//12
			$title_array[] = "����";								//13
			$title_array[] = "�ȼ�";								//14
			$title_array[] = "������ơ�����";						//15
			$title_array[] = "�����ǥ���";						//16
			$title_array[] = "����ꥢ";							//17
			$title_array[] = "ü��ID";								//18
			$title_array[] = "����̾";								//19
				
			$pref_array 				= $um->getAttrList('prefecture_id');
			$job_family_array 			= $um->getAttrList('job_family_id');
			$business_category_array 	= $um->getAttrList('business_category_id');
			$status_array 				= $um->getAttrList('user_status');
			$sex_array 					= $um->getAttrList('user_sex');
			$married_array 				= $um->getAttrList('user_is_married');
			$blood_array 				= $um->getAttrList('user_blood_type');
			$media_array 				= $um->getAttrList('media');
			$carrier_array 				= $um->getAttrList('user_carrier');
			
			//CSV�ǡ�������
			$lineArray = array();
			foreach($rows as $k => $v){
				$line_array = array();
				//1 �桼����ID
				$line_array[] = $v[user_id];
				
				//2 �˥å��͡���
				$line_array[] = $v[user_nickname];
				
				//3 �᡼�륢�ɥ쥹
				$line_array[] = $v[user_mailaddress];
				
				//4 ��Ͽ����
				$line_array[] = $v[user_created_time];
				
				//5 ��������
				$line_array[] = $v[user_updated_time];
				
				//6 ������
				$line_array[] = $v[user_deleted_time];
				
				//7 ��ǯ����
				$line_array[] = $v[user_birth_date];
				
				//8 ����
				$line_array[] = $sex_array[$v[user_sex]][name];
				
				//9 ����(��ƻ�ܸ�)
				$line_array[] = $pref_array[$v[prefecture_id]][name];
				
				//10 ��շ�
				$line_array[] = $blood_array[$v[user_blood_type]][name];
				
				//11 �뺧
				$line_array[] = $married_array[$v[user_is_married]][name];
				
				//12 ��̳��
				$line_array[] = $pref_array[$v[work_location_prefecture_id]][name];
				
				//13 ����
				$line_array[] = $job_family_array[$v[job_family_id]][name];
				 
				//14 �ȼ�
				$line_array[] = $business_category_array[$v[business_category_id]][name];
				
				//15 ����
				$line_array[] = $status_array[$v[user_status]][name];
				
				//16 �����ǥ���
				$line_array[] = $media_array[$v[media_id]][name];
				
				//17 ����ꥢ
				$line_array[] = $carrier_array[$v[user_carrier]][name];
				
				//18 ü��ID
				$line_array[] = $v[user_uid];
				
				//19 ����̾
				$line_array[] = $v[user_device];
				
				$lineArray[] = $line_array;
			}
			
			// CSV����
			$um->outputCsv($title_array, $lineArray);
			
			return "";
		}
		return 'admin_user_list';
	}
}
?>