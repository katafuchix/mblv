<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ゲーム登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminGameAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'game_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'game_code' => array(
			'type'				=> VAR_TYPE_STRING,
			'form_type'			=> FORM_TYPE_TEXT,
			'required'			=> true,
			'regexp'			=> '/^[a-zA-Z0-9]+$/',
			'min'				=> 1,
			'max'				=> 32,
			'required_error'	=> '{form}を半角英数字1文字以上で正しく入力してください',
			'min_error'			=> '{form}を半角英数字1文字以上で正しく入力してください',
			'max_error'			=> '{form}を半角英数字32文字以内で正しく入力してください',
			'regexp_error'		=> '{form}を半角英数字1文字以上で正しく入力してください',
		),
		'game_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'game_explain' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'game_file1' => array(
			'name'		=> '一覧表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file2' => array(
			'name'		=> '詳細表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file3' => array(
			'name'		=> 'ダウンロード用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'game_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,game_category',
		),
		'game_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'game_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// 配信開始
		'game_start_status' => array(
			'name'		=> 'ゲーム配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_start_year' => array(
			'name'		=> 'ゲーム配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_year' => array(
			'name'		=> 'ゲーム配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_month' => array(
			'name'		=> 'ゲーム配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_start_day' => array(
			'name'		=> 'ゲーム配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_start_hour' => array(
			'name'		=> 'ゲーム配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_start_min' => array(
			'name'		=> 'ゲーム配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'game_end_status' => array(
			'name'		=> 'ゲーム配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_end_year' => array(
			'name'		=> 'ゲーム配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_year' => array(
			'name'		=> 'ゲーム配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_month' => array(
			'name'		=> 'ゲーム配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_end_day' => array(
			'name'		=> 'ゲーム配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_end_hour' => array(
			'name'		=> 'ゲーム配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_end_min' => array(
			'name'		=> 'ゲーム配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理ゲーム登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGameAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if ($this->af->validate() > 0) return 'admin_game_add';
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
		$um =& $this->backend->getManager('Util');
		// 同じ識別コードがないかどうか確認
		$param = array(
			'sql_select'	=> 'game_id',
			'sql_from'		=> 'game',
			'sql_where'		=> 'game_code = ?',
			'sql_values'	=> array($this->af->get('game_code')),
		);
		$r = $um->dataQuery($param);
		if(count($r) > 0){
			$this->ae->add(null, '', E_ADMIN_GAME_CODE_DUPLICATE);
			return 'admin_game_add';
		}
		
		// ゲーム登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Game($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('game_status', 1);
		$o->set('game_created_time', $timestamp);
		$o->set('game_updated_time', $timestamp);
		// ゲーム配信終了数設定
		if(!$this->af->get('game_stock_status')){
			$o->set('game_stock_status', 0);
			$o->set('game_stock_num', '');
		}
		// ゲーム配信開始日時設定
		if(!$this->af->get('game_start_status')){
			$o->set('game_start_status', 0);
			$o->set('game_start_time', '');
		}else{
			$o->set('game_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('game_start_year' ),
					$this->af->get('game_start_month'),
					$this->af->get('game_start_day'),
					$this->af->get('game_start_hour'),
					$this->af->get('game_start_min')
				)
			);
		}
		// ゲーム配信終了日時設定
		if(!$this->af->get('game_end_status')){
			$o->set('game_end_status', 0);
			$o->set('game_end_time', '');
		}else{
			$o->set('game_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('game_end_year' ),
					$this->af->get('game_end_month'),
					$this->af->get('game_end_day'),
					$this->af->get('game_end_hour'),
					$this->af->get('game_end_min')
				)
			);
		}
		// ゲームファイル1のアップロード
		if($this->af->get('game_file1')){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file1', $um->uploadFile($this->af->get('game_file1'),'game'));
		}
		// ゲームファイル2のアップロード
		if($this->af->get('game_file2')){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file2', $um->uploadFile($this->af->get('game_file2'),'game'));
		}
		// ゲームファイル3のアップロード
		if($this->af->get('game_file3')){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file3', $um->uploadFile($this->af->get('game_file3'),'game'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_game_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_GAME_ADD_DONE);
		return 'admin_game_list';
	}
}
?>