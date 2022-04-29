<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター一覧アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarList extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_category_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'name'			=> 'アバターカテゴリ',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_category',
		),
		'avatar_id' => array(
			'name'			=> 'アバターID',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_name' => array(
			'name'			=> 'アバター名',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_desc' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_body' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_z' => array(
			'name'			=> 'アバターZ座標',
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// 配信数
		'avatar_stock_num' => array(
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'avatar_stock_status' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// ステータス
		'avatar_status' => array(
			'name'			=> 'アバターステータス',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'avatar_start_status' => array(
			'name'			=> 'アバター配信開始ステータス',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		'avatar_end_status' => array(
			'name'			=> 'アバター配信終了ステータス',
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// 作成期間
		'avatar_created_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_created_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_created_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_created_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_created_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_created_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 更新期間
		'avatar_updated_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_updated_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_updated_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_updated_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_updated_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_updated_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 削除期間
		'avatar_deleted_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_deleted_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_deleted_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_deleted_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_deleted_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_deleted_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信開始期間
		'avatar_start_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_start_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信終了期間
		'avatar_end_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_end_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
	);
}

/**
 * 管理アバター一覧アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarList extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		return 'admin_avatar_list';
	}
}
?>