<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザ一覧ページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminUserList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access public
	 */
	function preforward()
	{
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
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
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
		
		
		// ページャ
		$this->listview = array(
			'action_name'	=> 'admin_user_list',
			'sql_select'	=> 'user_id,user_mailaddress,user_nickname,user_status,user_magazine_error_num,user_created_time,user_updated_time,user_deleted_time,media_id',
			'sql_from'	=> 'user',
			'sql_where'	=> $sqlWhere,
			'sql_order'	=> 'user_created_time DESC',
			'sql_values'	=> $sqlValues,
		);
		
		//入会経路名取得
		$m = new Tv_Media($this->backend);
		$result = $m->searchProp(
			array('media_id', 'media_name'),
			array(),
			array('media_id' => OBJECT_SORT_ASC)
		);
		$m_data = array();
		foreach($result[1] as $item){
			$data[$item['media_id']] = array(
				'name' => $item['media_name'],
			);
		}
		// SQL実行
		$this->build();
		
		$um = $this->backend->getManager('Util');
		$m_data = $um->getAttrList('media');
		// リストを取り出す
		$_listviewData = $this->af->getApp('listview_data');
		foreach($_listviewData as $k => $v){
			// 入会経路があれば名前を取得する
			if($v['media_id']){
				$_listviewData[$k]['media_name'] = $data[$v['media_id']]['name'];
			}
		}
		
		// テンプレートへ引き渡す
		$this->af->setApp('listview_data', $_listviewData);
		
		
		// プロフィール項目呼び出し
		$configUserProf =& new Tv_ConfigUserProf($this->backend);
		$configUserProfList = $configUserProf->searchProp(
			array(
				'config_user_prof_id',
				'config_user_prof_name',
				'config_user_prof_type',
			),
			array(),
			array('config_user_prof_order' => 'ASC')
		);
		foreach($configUserProfList[1] as $key => $item)
		{
			if($item['config_user_prof_type'] >= 3)
			{
				$configUserProfOption =& new Tv_ConfigUserProfOption($this->backend);
				$filter = array(
					'config_user_prof_id' => new Ethna_AppSearchObject($item['config_user_prof_id'], OBJECT_CONDITION_EQ)
				);
				$configUserProfOptionList = $configUserProfOption->searchProp(
					array(
						'config_user_prof_option_id',
						'config_user_prof_option_name',
					),
					$filter,
					array('config_user_prof_option_order' => 'ASC')
				);
				$configUserProfList[1][$key]['config_user_prof_option'] = $configUserProfOptionList[1];
			}
		}
		$this->af->setApp('configUserProfList', $configUserProfList[1]);
	}
}
?>
