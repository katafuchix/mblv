<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ニュース一覧アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNewsList extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'news_id' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'news_title' => array(
		),
		'news_body' => array(
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'news_type' => array(
		),
		'news_time' => array(
		),
		'news_status' => array(
			'name'			=> 'ステータス',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,regist_status',
		),
		// 作成期間
		'news_created_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_created_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_created_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_created_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_created_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_created_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 更新期間
		'news_updated_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_updated_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_updated_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_updated_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_updated_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_updated_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 削除期間
		'news_deleted_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_deleted_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_deleted_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_deleted_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_deleted_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_deleted_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信開始期間
		'news_start_status' => array(
			'name'			=> '配信開始日時設定',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, regist_status',
		),
		'news_start_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_start_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 配信終了期間
		'news_end_status' => array(
			'name'			=> '配信終了日時設定',
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, regist_status',
		),
		'news_end_year_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day_start' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_end_year_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day_end' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 一括更新系
		'id' => array(
			'name'		=> 'ID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> array(FORM_TYPE_HIDDEN),
		),
		'check' => array(
			'name'		=> 'チェックID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'update'	=> array(),
	);
}

/**
 * 管理ニュース一覧アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsList extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_news_list';
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
		// ステータス、監視ステータス更新処理
		if($this->af->get('update'))
			$this->updateStatusAll('news');
		
		return 'admin_news_list';
	}
}
?>