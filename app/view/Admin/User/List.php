<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ一覧ページビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminUserList extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
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
			// URL検索
			'user_url' => array(
				'type' => 'LIKE',
				'column' => 'user_url',
			),
			// 自己紹介文
			'user_introduction' => array(
				'type' => 'LIKE',
				'column' => 'user_introduction',
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
			// 趣味
			'user_hobby' => array(
				'type' => 'LIKE',
				'column' => 'user_hobby',
			),
			// お届け先住所
			'user_address' => array(
				'type' => 'LIKE',
				'column' => 'user_address',
			),
			// お届け先住所(建物名)
			'user_address_building' => array(
				'type' => 'LIKE',
				'column' => 'user_address_building',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		// チェックボックスをグループ分けして検索条件をsql化
		// 都道府県など
		foreach($this->af->getDef() as $key => $form){
			if($form['form_type'] == FORM_TYPE_CHECKBOX){
				if(is_array($this->af->get($key))){
					$subSqlWhere = '';
					foreach($this->af->get($key) as $value){
						if($subSqlWhere) $subSqlWhere.= ' OR ';
						$subSqlWhere .= $key . '=?';
						$sqlValues[] = $value;
						// 検索結果を有効化
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
			// 検索結果を有効化
			if(!$this->af->get('user_prof_keyword_active')) $this->af->setApp('user_prof_keyword_active', true);
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
		
		
		// ソート
		if($this->af->get('sort_key')){
			$sqlOrder = $this->af->get('sort_key') .' ' .$this->af->get('sort_order');
			$this->af->setApp('sort_active', true);
		}else{
			$sqlOrder = 'user_updated_time DESC';
		}
		// ページャ
		$this->af->set('sort_active', true);
		$this->listview = array(
			'action_name'	=> 'admin_user_list',
			'sql_select'	=> '*',
			'sql_from'		=> 'user',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
		);
		// ダウンロードの場合
		if($this->af->get('download')){
			// 全件取得する
			$this->listview['data_only'] = true;
		}
		
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
	
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  @access public
	 */
	function forward()
	{
		// ダウンロードの場合
		if($this->af->get('download')){
			// listview実行
			$this->build();
			// ファイル名の決定
			$file_name = date('Ymd_His') . ".csv";
			// ファイル名ヘッダ出力
			header("Content-Disposition: inline ; filename={$file_name}" );
			// MIMEタイプヘッダ出力
			header("Content-type: text/octet-stream");
			// レンダラオブジェクトを取得
			$renderer =& $this->_getRenderer();
			// デフォルトマクロを実行
			$this->_setDefault($renderer);
			// HTMLを取得
			$html = $renderer->engine->fetch('admin/csv/user.tpl');
			// サイズヘッダ出力
			header("Content-Length: ". strlen($html));
			// 文字コードを変換して出力
			echo mb_convert_encoding($html, "SJIS", "EUC-JP");
			// 終了
			exit;
		}
		// その他の場合
		else{
			parent::forward();
		}
	}
}
?>