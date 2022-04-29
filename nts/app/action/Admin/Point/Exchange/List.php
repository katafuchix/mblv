<?php
/**
 * List.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理ポイント交換一覧アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminPointExchangeList extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'point_type' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> 'ポイントタイプ',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array(
					10 => 'イーバンク交換',
					11 => 'Edy交換',
					12 => 'ポイントオン交換',
			),
		),
		'point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'name'		=> 'ポイントステータス',
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, point_status',
		),
		'user_id' => array(
			'name'		=> 'ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_nickname' => array(
			'name'		=> 'ニックネーム',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'point_exchange_year_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,year',
		),
		'point_exchange_month_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,month',
		),
		'point_exchange_day_start' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,day',
		),
		'point_exchange_year_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,year',
		),
		'point_exchange_month_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,month',
		),
		'point_exchange_day_end' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,day',
		),
		'start' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'csv' => array(
		),
	);
}

/**
 * 管理ポイント交換一覧アクション実行クラス
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminPointExchangeList extends Tv_ActionAdminOnly
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
		return 'admin_point_exchange_list';
	}
}
?>