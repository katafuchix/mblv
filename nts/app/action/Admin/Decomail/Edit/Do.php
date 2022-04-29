<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメール編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminDecomailEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'decomail_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'decomail_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'decomail_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
		'decomail_file1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'decomail_file1_file' => array(
			'name'		=> '一覧表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file1_status' => array(
			'name'		=> '一覧表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'decomail_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'decomail_file2_file' => array(
			'name'		=> '詳細表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file2_status' => array(
			'name'		=> '詳細表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'decomail_file_d' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'decomail_file_d_file' => array(
			'name'		=> 'DOCOMO用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_d_status' => array(
			'name'		=> 'DOCOMO用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'decomail_file_a' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'decomail_file_a_file' => array(
			'name'		=> 'AU用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_a_status' => array(
			'name'		=> 'AU用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'decomail_file_s' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'decomail_file_s_file' => array(
			'name'		=> 'SOFTBANK用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_s_status' => array(
			'name'		=> 'SOFTBANK用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'decomail_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'default'	=> 0,
		),
		'decomail_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,decomail_category',
		),
		'decomail_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'decomail_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// 配信開始
		'decomail_start_status' => array(
			'name'		=> 'デコメール配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'decomail_start_year' => array(
			'name'		=> 'デコメール配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_start_year' => array(
			'name'		=> 'デコメール配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_start_month' => array(
			'name'		=> 'デコメール配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'decomail_start_day' => array(
			'name'		=> 'デコメール配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'decomail_start_hour' => array(
			'name'		=> 'デコメール配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'decomail_start_min' => array(
			'name'		=> 'デコメール配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'decomail_end_status' => array(
			'name'		=> 'デコメール配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'decomail_end_year' => array(
			'name'		=> 'デコメール配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_end_year' => array(
			'name'		=> 'デコメール配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'decomail_end_month' => array(
			'name'		=> 'デコメール配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'decomail_end_day' => array(
			'name'		=> 'デコメール配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'decomail_end_hour' => array(
			'name'		=> 'デコメール配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'decomail_end_min' => array(
			'name'		=> 'デコメール配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理デコメール編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomail_edit';
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
		// デコメール編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('decomail_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('decomail_updated_time', $timestamp);
		// デコメール配信終了数設定
		if(!$this->af->get('decomail_stock_status')){
			$o->set('decomail_stock_status', 0);
			$o->set('decomail_stock_num', '');
		}
		// デコメール配信開始日時設定
		if(!$this->af->get('decomail_start_status')){
			$o->set('decomail_start_status', 0);
			$o->set('decomail_start_time', '');
		}else{
			$o->set('decomail_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('decomail_start_year' ),
					$this->af->get('decomail_start_month'),
					$this->af->get('decomail_start_day'),
					$this->af->get('decomail_start_hour'),
					$this->af->get('decomail_start_min')
				)
			);
		}
		// デコメール配信終了日時設定
		if(!$this->af->get('decomail_end_status')){
			$o->set('decomail_end_status', 0);
			$o->set('decomail_end_time', '');
		}else{
			$o->set('decomail_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('decomail_end_year' ),
					$this->af->get('decomail_end_month'),
					$this->af->get('decomail_end_day'),
					$this->af->get('decomail_end_hour'),
					$this->af->get('decomail_end_min')
				)
			);
		}
		// デコメールファイル1のアップロード
		if($this->af->get('decomail_file1_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file1', $um->uploadFile($this->af->get('decomail_file1_file'),'decomail'));
		}elseif($this->af->get('decomail_file1_status') == 'delete'){
			$o->set('decomail_file1', '');
		}
		// デコメールファイル2のアップロード
		if($this->af->get('decomail_file2_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file2', $um->uploadFile($this->af->get('decomail_file2_file'),'decomail'));
		}elseif($this->af->get('decomail_file2_status') == 'delete'){
			$o->set('decomail_file2', '');
		}
		// DOCOMO用デコメールファイルのアップロード
		if($this->af->get('decomail_file_d_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_d', $um->uploadFile($this->af->get('decomail_file_d_file'),'decomail'));
		}elseif($this->af->get('decomail_file_d_status') == 'delete'){
			$o->set('decomail_file_d', '');
		}
		// AU用デコメールファイル_aのアップロード
		if($this->af->get('decomail_file_a_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_a', $um->uploadFile($this->af->get('decomail_file_a_file'),'decomail'));
		}elseif($this->af->get('decomail_file_a_status') == 'delete'){
			$o->set('decomail_file_a', '');
		}
		// SOFTBANK用デコメールファイル_sのアップロード
		if($this->af->get('decomail_file_s_status') == 'edit'){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_s', $um->uploadFile($this->af->get('decomail_file_s_file'),'decomail'));
		}elseif($this->af->get('decomail_file_s_status') == 'delete'){
			$o->set('decomail_file_s', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_decomail_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_EDIT_DONE);
		return 'admin_decomail_list';
	}
}
?>