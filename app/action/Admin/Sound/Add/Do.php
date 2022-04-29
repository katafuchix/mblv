<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンド登録実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundAddDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'sound_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'sound_desc' => array(
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'sound_file1' => array(
			'name'			=> '一覧表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file2' => array(
			'name'			=> '詳細表示用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_d' => array(
			'name'			=> 'DOCOMO用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_a' => array(
			'name'			=> 'AU用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_file_s' => array(
			'name'			=> 'SOFTBANK用ファイル',
			'type'			=> VAR_TYPE_FILE,
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'sound_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'sound_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'		=> 'Util,sound_category',
		),
		'sound_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'sound_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// 配信開始
		'sound_start_status' => array(
			'name'			=> 'サウンド配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'sound_start_time' => array(
			'name'		=> 'サウンド配信開始日時',
		),
		'sound_start_year' => array(
			'name'			=> 'サウンド配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_year' => array(
			'name'			=> 'サウンド配信開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_month' => array(
			'name'			=> 'サウンド配信開始日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_start_day' => array(
			'name'			=> 'サウンド配信開始日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_start_hour' => array(
			'name'			=> 'サウンド配信開始日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'sound_start_min' => array(
			'name'			=> 'サウンド配信開始日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'sound_end_status' => array(
			'name'			=> 'サウンド配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'sound_end_time' => array(
			'name'		=> 'サウンド配信終了日時',
		),
		'sound_end_year' => array(
			'name'			=> 'サウンド配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_year' => array(
			'name'			=> 'サウンド配信終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_month' => array(
			'name'			=> 'サウンド配信終了日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_end_day' => array(
			'name'			=> 'サウンド配信終了日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_end_hour' => array(
			'name'			=> 'サウンド配信終了日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'sound_end_min' => array(
			'name'			=> 'サウンド配信終了日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理サウンド登録実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_sound_add';
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
		// サウンド登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Sound($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('sound_status', 1);
		$o->set('sound_created_time', $timestamp);
		$o->set('sound_updated_time', $timestamp);
		// サウンド配信終了数設定
		if(!$this->af->get('sound_stock_status')){
			$o->set('sound_stock_status', 0);
			$o->set('sound_stock_num', '');
		}
		// サウンド配信開始日時設定
		if(!$this->af->get('sound_start_status')){
			$o->set('sound_start_status', 0);
			$o->set('sound_start_time', '');
		}else{
			$o->set('sound_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('sound_start_year' ),
					$this->af->get('sound_start_month'),
					$this->af->get('sound_start_day'),
					$this->af->get('sound_start_hour'),
					$this->af->get('sound_start_min')
				)
			);
		}
		// サウンド配信終了日時設定
		if(!$this->af->get('sound_end_status')){
			$o->set('sound_end_status', 0);
			$o->set('sound_end_time', '');
		}else{
			$o->set('sound_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('sound_end_year' ),
					$this->af->get('sound_end_month'),
					$this->af->get('sound_end_day'),
					$this->af->get('sound_end_hour'),
					$this->af->get('sound_end_min')
				)
			);
		}
		// サウンドファイル1のアップロード
		if($this->af->get('sound_file1')){
			$o->set('sound_file1', $um->uploadFile($this->af->get('sound_file1'),'sound'));
		}
		// サウンドファイル2のアップロード
		if($this->af->get('sound_file2')){
			$o->set('sound_file2', $um->uploadFile($this->af->get('sound_file2'),'sound'));
		}
		// サウンドファイルdのアップロード
		if($this->af->get('sound_file_d')){
			$o->set('sound_file_d', $um->uploadFile($this->af->get('sound_file_d'),'sound'));
		}
		// サウンドファイルaのアップロード
		if($this->af->get('sound_file_a')){
			$o->set('sound_file_a', $um->uploadFile($this->af->get('sound_file_a'),'sound'));
		}
		// サウンドファイルsのアップロード
		if($this->af->get('sound_file_s')){
			$o->set('sound_file_s', $um->uploadFile($this->af->get('sound_file_s'),'sound'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_sound_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SOUND_ADD_DONE);
		return 'admin_sound_list';
	}
}
?>