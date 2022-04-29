<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンド一覧アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundList extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'sound_category_id' => array(
			'name'		=> 'サウンドカテゴリ',
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,sound_category',
		),
		'sound_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'sound_name' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'sound_desc' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// 配信数
		'sound_stock_num' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'sound_stock_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ステータス
		'sound_status' => array(
			'name'		=> 'サウンドステータス',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'sound_start_status' => array(
			'name'		=> 'サウンド配信開始ステータス',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'sound_end_status' => array(
			'name'		=> 'サウンド配信終了ステータス',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// 作成期間
		'sound_created_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_created_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_created_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_created_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_created_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_created_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 更新期間
		'sound_updated_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_updated_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_updated_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_updated_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_updated_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_updated_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 削除期間
		'sound_deleted_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_deleted_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_deleted_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_deleted_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_deleted_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_deleted_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信開始期間
		'sound_start_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_start_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_start_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_start_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_start_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信終了期間
		'sound_end_year_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_month_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_end_day_start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sound_end_year_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'sound_end_month_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'sound_end_day_end' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
	);
}
/**
 * 管理サウンド一覧アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundList extends Tv_ActionAdminOnly
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
		//if ($this->af->validate() > 0) return 'admin_soundcategory_list';
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
		return 'admin_sound_list';
	}
}
?>