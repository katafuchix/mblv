<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ビデオ編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminVideoEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'video_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'video_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'video_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'video_file1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file1_file' => array(
			'name'			=> '一覧表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file1_status' => array(
			'name'			=> '一覧表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file2_file' => array(
			'name'			=> '詳細表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file2_status' => array(
			'name'			=> '詳細表示用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_d' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_d_file' => array(
			'name'			=> 'DOCOMO用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_d_status' => array(
			'name'			=> 'DOCOMO用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_a' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_a_file' => array(
			'name'			=> 'AU用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_a_status' => array(
			'name'			=> 'AU用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'video_file_s' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'video_file_s_file' => array(
			'name'			=> 'SOFTBANK用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'video_file_s_status' => array(
			'name'			=> 'SOFTBANK用ファイルステータス',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
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
			'name'			=> 'ビデオ配信開始日時',
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
			'name'			=> 'ビデオ配信終了日時',
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
 * 管理ビデオ編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminVideoEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_video_edit';
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
		// ビデオ編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Video($this->backend, 'video_id', $this->af->get('video_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
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
		// ビデオファイル1のアップロード(1=編集)
		if($this->af->get('video_file1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file1', $um->uploadFile($this->af->get('video_file1_file'),'video'));
		}
		// ビデオファイル1の削除(2=削除)
		elseif($this->af->get('video_file1_status') == 2){
			$o->set('video_file1', '');
		}
		// ビデオファイル2のアップロード(1=編集)
		if($this->af->get('video_file2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file2', $um->uploadFile($this->af->get('video_file2_file'),'video'));
		}
		// ビデオファイル2の削除(2=削除)
		elseif($this->af->get('video_file2_status') == 2){
			$o->set('video_file2', '');
		}
		// ビデオファイルdのアップロード(1=編集)
		if($this->af->get('video_file_d_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_d', $um->uploadFile($this->af->get('video_file_d_file'),'video'));
		}
		// ビデオファイルdの削除(2=削除)
		elseif($this->af->get('video_file_d_status') == 2){
			$o->set('video_file_d', '');
		}
		// ビデオファイルaのアップロード(1=編集)
		if($this->af->get('video_file_a_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_a', $um->uploadFile($this->af->get('video_file_a_file'),'video'));
		}
		// ビデオファイルaの削除(2=削除)
		elseif($this->af->get('video_file_a_status') == 2){
			$o->set('video_file_a', '');
		}
		// ビデオファイルsのアップロード(1=編集)
		if($this->af->get('video_file_s_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('video_file_s', $um->uploadFile($this->af->get('video_file_s_file'),'video'));
		}
		// ビデオファイルsの削除(2=削除)
		elseif($this->af->get('video_file_s_status') == 2){
			$o->set('video_file_s', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_video_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_VIDEO_EDIT_DONE);
		return 'admin_video_list';
	}
}
?>