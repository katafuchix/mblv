<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ユーザ一覧実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserList extends Tv_ActionForm
{
	/** @var bool バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'		=> 'ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_nickname' => array(
			'name'		=> 'ニックネーム',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_mailaddress' => array(
			'name'		=> 'メールアドレス',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_min' => array(
			'name'		=> '年齢(最低)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'		=> '年齢(最高)',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_sex' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_mailaddress' => array(
			'name'		=> 'メールアドレス',
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
			'name'		=> '状態',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, user_status',
		),
		'user_prof_checkbox' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_prof_keyword' => array(
			'name'		=> 'キーワード',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// 登録期間
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
		// 更新期間
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
		// 退会期間
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
			'name'			=> 'キャリア',
		),
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, media',
			'name'			=> '入会経路',
		),
		'user_device' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'name'		=> '機種名',
		),
		'download' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * 管理ユーザ一覧実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserList extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'admin_user_list';
		
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// csvダウンロード
		if($this->af->get('download')){
			$um = $this->backend->getManager('Util');
			
			// 検索条件の生成
			$condition = array(
				// ユーザID検索
				'user_id' => array(
					'type' => 'EQ',
					'column' => 'user_id',
				),
				// メールアドレス検索
				'user_mailaddress' => array(
					'type' => 'LIKE',
					'column' => 'user_mailaddress',
				),
				// ユーザニックネーム検索
				'user_nickname' => array(
					'type' => 'LIKE',
					'column' => 'user_nickname',
				),
				// 年齢検索
				'user_age' => array(
					'type' => 'AGE',
					'column' => 'user_birth_date',
				),
				// 性別検索
				/*
				'user_sex' => array(
					'type' => 'EQ',
					'column' => 'user_sex',
				),
				*/
				// ユーザステータス検索
				'user_status' => array(
					'type' => 'EQ',
					'column' => 'user_status',
				),
				// 登録日時検索
				'user_created' => array(
					'type' => 'PERIOD',
					'column' => 'user_created_time',
				),
				// 更新日時検索
				'user_updated' => array(
					'type' => 'PERIOD',
					'column' => 'user_updated_time',
				),
				// 退会日時検索
				'user_deleted' => array(
					'type' => 'PERIOD',
					'column' => 'user_deleted_time',
				),
				// キャリア
				'user_carrier' => array(
					'type' => 'EQ',
					'column' => 'user_carrier',
				),
				// 機種名
				'user_device' => array(
					'type' => 'LIKE',
					'column' => 'user_device',
				),
				// 入会経路
				'media_id' => array(
					'type' => 'EQ',
					'column' => 'media_id',
				),
			);
			
			list($sqlWhere, $sqlValues) = $um->getDataCondition($condition);
			
			// チェックボックスをグループ分けして検索条件をsql化
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
			
			// オプション項目start
			$db = $this->backend->getDB();
			// 項目ごとにuser_profテーブルの検索を行ってユーザを絞り込む
			// チェックボックス
			$form = array_merge($_GET, $_POST);
			$checkbox = array();
			foreach($form as $k => $v){
				// オプション項目のみを抽出
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
			
			// キーワード
			if($this->af->get('user_prof_keyword') != ''){
				// スペース区切りでキーワードを分割
				$keyword = str_replace('　', ' ', $this->af->get('user_prof_keyword'));
				$keywordList = explode(' ', $keyword);
				$sqlKeyword = array();
				foreach($keywordList as $word){
					if($word){ // スペースが複数連続して入力された場合を考慮
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
					// 結合条件を付与
					if($sqlWhere) $sqlWhere .= ' AND ';
					$sqlWhere .= "user_id in ({$user_id_in})";
				}
			} 
			// オプション項目end
			
			// SQL実行
			$param = array(
				'sql_select'	=> ' * ',
				'sql_from'	=> ' user ',
				'sql_where'	=> $sqlWhere,
				'sql_order'	=> 'user_created_time DESC',
				'sql_values'	=> $sqlValues,
			);
			
			$rows = $um->dataQuery($param);
			//ＣＳＶ見出し行 まず見出しを作成
			// メールアドレス、性別、生年月日、地域、
			// 入会日、退会日、会員ステータス、入会メディア、キャリア、端末ID、機種名
			// （auに関してはデバイスID）
			$title_array = array();
			$title_array[] = "ユーザーID";							//1
			$title_array[] = "ニックネーム";						//2
			$title_array[] = "メールアドレス";						//3
			$title_array[] = "登録期間";							//4
			$title_array[] = "更新期間";							//5
			$title_array[] = "退会期間";							//6
			$title_array[] = "生年月日";							//7
			$title_array[] = "性別";								//8
			$title_array[] = "住所(都道府県)";						//9
			$title_array[] = "血液型";								//10
			$title_array[] = "結婚";								//11
			$title_array[] = "勤務地";								//12
			$title_array[] = "職種";								//13
			$title_array[] = "業種";								//14
			$title_array[] = "会員ステータス";						//15
			$title_array[] = "入会メディア";						//16
			$title_array[] = "キャリア";							//17
			$title_array[] = "端末ID";								//18
			$title_array[] = "機種名";								//19
				
			$pref_array 				= $um->getAttrList('prefecture_id');
			$job_family_array 			= $um->getAttrList('job_family_id');
			$business_category_array 	= $um->getAttrList('business_category_id');
			$status_array 				= $um->getAttrList('user_status');
			$sex_array 					= $um->getAttrList('user_sex');
			$married_array 				= $um->getAttrList('user_is_married');
			$blood_array 				= $um->getAttrList('user_blood_type');
			$media_array 				= $um->getAttrList('media');
			$carrier_array 				= $um->getAttrList('user_carrier');
			
			//CSVデータ生成
			$lineArray = array();
			foreach($rows as $k => $v){
				$line_array = array();
				//1 ユーザーID
				$line_array[] = $v[user_id];
				
				//2 ニックネーム
				$line_array[] = $v[user_nickname];
				
				//3 メールアドレス
				$line_array[] = $v[user_mailaddress];
				
				//4 登録期間
				$line_array[] = $v[user_created_time];
				
				//5 更新期間
				$line_array[] = $v[user_updated_time];
				
				//6 退会期間
				$line_array[] = $v[user_deleted_time];
				
				//7 生年月日
				$line_array[] = $v[user_birth_date];
				
				//8 性別
				$line_array[] = $sex_array[$v[user_sex]][name];
				
				//9 住所(都道府県)
				$line_array[] = $pref_array[$v[prefecture_id]][name];
				
				//10 血液型
				$line_array[] = $blood_array[$v[user_blood_type]][name];
				
				//11 結婚
				$line_array[] = $married_array[$v[user_is_married]][name];
				
				//12 勤務地
				$line_array[] = $pref_array[$v[work_location_prefecture_id]][name];
				
				//13 職種
				$line_array[] = $job_family_array[$v[job_family_id]][name];
				 
				//14 業種
				$line_array[] = $business_category_array[$v[business_category_id]][name];
				
				//15 状態
				$line_array[] = $status_array[$v[user_status]][name];
				
				//16 入会メディア
				$line_array[] = $media_array[$v[media_id]][name];
				
				//17 キャリア
				$line_array[] = $carrier_array[$v[user_carrier]][name];
				
				//18 端末ID
				$line_array[] = $v[user_uid];
				
				//19 機種名
				$line_array[] = $v[user_device];
				
				$lineArray[] = $line_array;
			}
			
			// CSV出力
			$um->outputCsv($title_array, $lineArray);
			
			return "";
		}
		return 'admin_user_list';
	}
}
?>