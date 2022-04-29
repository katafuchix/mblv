<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲーム編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminGameEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'game_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'game_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
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
			'required'		=> true,
		),
		'game_explain' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'game_file1_file' => array(
			'name'			=> '一覧表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file1_status' => array(
			'name'			=> '一覧表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'game_file2_file' => array(
			'name'			=> '詳細表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file2_status' => array(
			'name'			=> '詳細表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_file3' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'game_file3_file' => array(
			'name'			=> 'ダウンロード用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'game_file3_status' => array(
			'name'			=> 'ダウンロード用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'game_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'game_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
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
			'name'			=> 'ゲーム配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_start_time' => array(
			'name'			=> 'ゲーム配信開始日時',
		),
		'game_start_year' => array(
			'name'			=> 'ゲーム配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_year' => array(
			'name'			=> 'ゲーム配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_start_month' => array(
			'name'			=> 'ゲーム配信開始日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_start_day' => array(
			'name'			=> 'ゲーム配信開始日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_start_hour' => array(
			'name'			=> 'ゲーム配信開始日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_start_min' => array(
			'name'			=> 'ゲーム配信開始日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'game_end_status' => array(
			'name'			=> 'ゲーム配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'game_end_time' => array(
			'name'			=> 'ゲーム配信終了日時',
		),
		'game_end_year' => array(
			'name'			=> 'ゲーム配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_year' => array(
			'name'			=> 'ゲーム配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'game_end_month' => array(
			'name'			=> 'ゲーム配信終了日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'game_end_day' => array(
			'name'			=> 'ゲーム配信終了日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'game_end_hour' => array(
			'name'			=> 'ゲーム配信終了日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'game_end_min' => array(
			'name'			=> 'ゲーム配信終了日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理ゲーム編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminGameEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_game_edit';
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
		// ゲーム編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		
		// 同じ識別コードがないかどうか確認
		if($this->af->get('game_code') != $o->get('game_code')){
			$um = $this->backend->getManager('Util');
			$param = array(
				'sql_select'	=> 'game_id',
				'sql_from'		=> 'game',
				'sql_where'		=> 'game_code = ?',
				'sql_values'	=> array($this->af->get('game_code')),
			);
			$r = $um->dataQuery($param);
			if(count($r) > 0){
				$this->ae->add(null, '', E_ADMIN_GAME_CODE_DUPLICATE);
				return 'admin_game_edit';
			}
		}
		
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
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
		// ゲームファイル1のアップロード(1=編集)
		if($this->af->get('game_file1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file1', $um->uploadFile($this->af->get('game_file1_file'),'game'));
		}
		// ゲームファイル1の削除(2=削除)
		elseif($this->af->get('game_file1_status') == 2){
			$o->set('game_file1', '');
		}
		// ゲームファイル2のアップロード(1=編集)
		if($this->af->get('game_file2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file2', $um->uploadFile($this->af->get('game_file2_file'),'game'));
		}
		// ゲームファイル2の削除(2=削除)
		elseif($this->af->get('game_file2_status') == 2){
			$o->set('game_file2', '');
		}
		// ゲームファイル3のアップロード(1=編集)
		if($this->af->get('game_file3_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('game_file3', $um->uploadFile($this->af->get('game_file3_file'),'game'));
		}
		// ゲームファイル3の削除(2=削除)
		elseif($this->af->get('game_file3_status') == 2){
			$o->set('game_file3', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_game_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_GAME_EDIT_DONE);
		return 'admin_game_list';
	}
}
?>