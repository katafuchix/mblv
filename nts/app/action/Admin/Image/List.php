<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理画像一覧実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminImageList extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'	  	=> '所有ユーザID',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'image_mime_type' => array(
			'name'	  	=> 'MIMEタイプ',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'image_size_max' => array(
			'name'	  	=> '画像サイズ(最大)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'image_size_min' => array(
			'name'	  	=> '画像サイズ(最小)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'image_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'image_checked' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_checked',
		),
		// 投稿期間
		'image_created_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'image_created_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'image_created_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'image_created_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'image_created_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'image_created_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 削除期間
		'image_deleted_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'image_deleted_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'image_deleted_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'image_deleted_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'image_deleted_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'image_deleted_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sort_key' => array(
			'name'	  => 'ソートに使用するキー',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('所有ユーザID', 'MIMEタイプ', '画像サイズ', '投稿日時', '削除日時'),
		),
		'sort_order' => array(
			'name'	  => 'ソート順',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('昇順', '降順'),
		),
		// 更新系処理
		'update' => array(),
		'page' => array(),
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
	);
}

/**
 * 管理画像一覧実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminImageList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_image_list';
		
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
		if($this->af->get('update')) $this->updateStatusAll('image');
		
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'admin_image_list';
	}
}
?>