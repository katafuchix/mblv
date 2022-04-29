<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオ登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideoAddDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'video_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_desc' => array(
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'video_file1' => array(
			'name'			=> '一覧表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file2' => array(
			'name'			=> '詳細表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_d' => array(
			'name'			=> 'DOCOMO用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_a' => array(
			'name'			=> 'AU用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_s' => array(
			'name'			=> 'SOFTBANK用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'video_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'		=> 'Util,video_category',
		),
		'video_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'video_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// 配信開始
		'video_start_status' => array(
			'name'			=> 'ビデオ配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'video_start_time' => array(
			'name'		=> 'ビデオ配信開始日時',
		),
		'video_start_year' => array(
			'name'			=> 'ビデオ配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_start_year' => array(
			'name'			=> 'ビデオ配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_start_month' => array(
			'name'			=> 'ビデオ配信開始日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'video_start_day' => array(
			'name'			=> 'ビデオ配信開始日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'video_start_hour' => array(
			'name'			=> 'ビデオ配信開始日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'video_start_min' => array(
			'name'			=> 'ビデオ配信開始日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'video_end_status' => array(
			'name'			=> 'ビデオ配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'video_end_time' => array(
			'name'		=> 'ビデオ配信終了日時',
		),
		'video_end_year' => array(
			'name'			=> 'ビデオ配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_end_year' => array(
			'name'			=> 'ビデオ配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'video_end_month' => array(
			'name'			=> 'ビデオ配信終了日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'video_end_day' => array(
			'name'			=> 'ビデオ配信終了日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'video_end_hour' => array(
			'name'			=> 'ビデオ配信終了日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'video_end_min' => array(
			'name'			=> 'ビデオ配信終了日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理ビデオ登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideoAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_video_add';
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
		// ビデオ登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Video($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('video_status', 1);
		$o->set('video_created_time', $timestamp);
		$o->set('video_updated_time', $timestamp);
		// ビデオ配信終了数設定
		if(!$this->af->get('video_stock_status')){
			$o->set('video_stock_status', 0);
			$o->set('video_stock_num', '');
		}
		// ビデオ配信開始日時設定
		if(!$this->af->get('video_start_status')){
			$o->set('video_start_status', 0);
			$o->set('video_start_time', '');
		}else{
			$o->set('video_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('video_start_year' ),
					$this->af->get('video_start_month'),
					$this->af->get('video_start_day'),
					$this->af->get('video_start_hour'),
					$this->af->get('video_start_min')
				)
			);
		}
		// ビデオ配信終了日時設定
		if(!$this->af->get('video_end_status')){
			$o->set('video_end_status', 0);
			$o->set('video_end_time', '');
		}else{
			$o->set('video_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('video_end_year' ),
					$this->af->get('video_end_month'),
					$this->af->get('video_end_day'),
					$this->af->get('video_end_hour'),
					$this->af->get('video_end_min')
				)
			);
		}
		// ビデオファイル1のアップロード
		if($this->af->get('video_file1')){
			$o->set('video_file1', $um->uploadFile($this->af->get('video_file1'),'video'));
		}
		// ビデオファイル2のアップロード
		if($this->af->get('video_file2')){
			$o->set('video_file2', $um->uploadFile($this->af->get('video_file2'),'video'));
		}
		// ビデオファイルdのアップロード
		if($this->af->get('video_file_d')){
			$o->set('video_file_d', $um->uploadFile($this->af->get('video_file_d'),'video'));
		}
		// ビデオファイルaのアップロード
		if($this->af->get('video_file_a')){
			$o->set('video_file_a', $um->uploadFile($this->af->get('video_file_a'),'video'));
		}
		// ビデオファイルsのアップロード
		if($this->af->get('video_file_s')){
			$o->set('video_file_s', $um->uploadFile($this->af->get('video_file_s'),'video'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_video_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_ADD_DONE);
		return 'admin_video_list';
	}
}
?>