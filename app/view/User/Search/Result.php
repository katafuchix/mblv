<?php
/**
 * Result.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ検索結果画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserSearchResult extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$condition = array(
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
			),
			// 年齢検索
			'user_age' => array(
				'type' => 'AGE',
				'column' => 'user_birth_date',
				'public' => true,
			),
//			// 性別検索
//			'user_sex' => array(
//				'type' => 'EQ',
//			),
			// 住所(都道府県)
			'prefecture_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 血液型
			'user_blood_type' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 職種
			'job_family_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 業種
			'business_category_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 結婚
			'user_is_married' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 子供
			'user_has_children' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 勤務地
			'work_location_prefecture_id' => array(
				'type' => 'EQ',
				'public' => true,
			),
			// 趣味
			'user_hobby' => array(
				'type' => 'LIKE',
				'public' => true,
			),
			// URL
			'user_url' => array(
				'type' => 'LIKE',
				'public' => true,
			),
			// 自己紹介
			'user_introduction' => array(
				'type' => 'LIKE',
				'public' => true,
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// WHERE句生成
		$user_session = $this->session->get('user');
		if($sqlWhere) $sqlWhere .= ' AND ';
		$sqlWhere .= "user_status = 2 AND user_id <> {$user_session['user_id']}";
		
		// 性別検索
		if($this->af->get('user_sex') != 0){
			$sqlWhere .= " AND user_sex = ?";
			$sqlValues[] = $this->af->get('user_sex');
			$sqlWhere .= " AND user_sex_public = ?";
			$sqlValues[] = 1;
		}
		
		// オプション項目start
		$db = $this->backend->getDB();
		// 項目ごとにuser_profテーブルの検索を行ってユーザを絞り込む
		// セレクトボックス
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
		// ラジオボタン
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
		// チェックボックス
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
				$sqlWhere .= " AND user_id in ({$user_id_in})";
			}
		} 
		// オプション項目end
		// リストビュー
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