<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理お題登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminThemaAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'thema_title' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		//	'required'	=> true,
		),
		'thema_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'thema_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
		'thema_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'thema_start_status' => array(
			'name'		=> 'お題配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'thema_start_year' => array(
			'name'		=> 'お題配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_start_year' => array(
			'name'		=> 'お題配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_start_month' => array(
			'name'		=> 'お題配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'thema_start_day' => array(
			'name'		=> 'お題配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'thema_start_hour' => array(
			'name'		=> 'お題配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'thema_start_min' => array(
			'name'		=> 'お題配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'thema_end_status' => array(
			'name'		=> 'お題配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'thema_end_year' => array(
			'name'		=> 'お題配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_end_year' => array(
			'name'		=> 'お題配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'thema_end_month' => array(
			'name'		=> 'お題配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'thema_end_day' => array(
			'name'		=> 'お題配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'thema_end_hour' => array(
			'name'		=> 'お題配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'thema_end_min' => array(
			'name'		=> 'お題配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'thema_stock_num' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'thema_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'type'			=> VAR_TYPE_STRING,
			'option'		=> array(1=>''),
		),
	);
}

/**
 * 管理お題登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminThemaAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_thema_add';
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
		// ゲームカテゴリ登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Thema($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('thema_status', 1);
		
		// お題配信開始日時設定
		if(!$this->af->get('thema_start_status')){
			$o->set('thema_start_status', 0);
			$o->set('thema_start_time', '');
		}else{
			$o->set('thema_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('thema_start_year' ),
					$this->af->get('thema_start_month'),
					$this->af->get('thema_start_day'),
					$this->af->get('thema_start_hour'),
					$this->af->get('thema_start_min')
				)
			);
		}
		// お題配信終了日時設定
		if(!$this->af->get('thema_end_status')){
			$o->set('thema_end_status', 0);
			$o->set('thema_end_time', '');
		}else{
			$o->set('thema_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('thema_end_year' ),
					$this->af->get('thema_end_month'),
					$this->af->get('thema_end_day'),
					$this->af->get('thema_end_hour'),
					$this->af->get('thema_end_min')
				)
			);
		}
		
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_thema_list';
		
		$this->ae->add(null, '', I_ADMIN_THEMA_ADD_DONE);
		return 'admin_thema_list';
	}
}
?>
