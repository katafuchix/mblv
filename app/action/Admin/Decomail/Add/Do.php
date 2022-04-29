<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理デコメール登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminDecomailAddDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'decomail_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'decomail_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'decomail_file1' => array(
			'name'		=> '一覧表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file2' => array(
			'name'		=> '詳細表示用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_d' => array(
			'name'		=> 'DOCOMO用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_a' => array(
			'name'		=> 'AU用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_file_s' => array(
			'name'		=> 'SOFTBANK用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'decomail_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
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
		'decomail_start_time' => array(
			'name'		=> 'デコメール配信開始日時',
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
		'decomail_end_time' => array(
			'name'		=> 'デコメール配信終了日時',
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
 * 管理デコメール登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminDecomailAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_decomail_add';
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
		// デコメール登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Decomail($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('decomail_status', 1);
		$o->set('decomail_created_time', $timestamp);
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
		if($this->af->get('decomail_file1')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file1', $um->uploadFile($this->af->get('decomail_file1'),'decomail'));
		}
		// デコメールファイル2のアップロード
		if($this->af->get('decomail_file2')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file2', $um->uploadFile($this->af->get('decomail_file2'),'decomail'));
		}
		// DOCOMO用デコメールファイルのアップロード
		if($this->af->get('decomail_file_d')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_d', $um->uploadFile($this->af->get('decomail_file_d'),'decomail'));
		}
		// AU用デコメールファイルのアップロード
		if($this->af->get('decomail_file_a')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_a', $um->uploadFile($this->af->get('decomail_file_a'),'decomail'));
		}
		// SOFTBANK用デコメールファイルのアップロード
		if($this->af->get('decomail_file_s')){
			$um =& $this->backend->getManager('Util');
			$o->set('decomail_file_s', $um->uploadFile($this->af->get('decomail_file_s'),'decomail'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_decomail_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_ADD_DONE);
		return 'admin_decomail_list';
	}
}
?>