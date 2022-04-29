<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ファイル一覧実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminFileList extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'	  	=> '所有ユーザID',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_mime_type' => array(
			'name'	  	=> 'MIMEタイプ',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_size_max' => array(
			'name'	  	=> 'ファイルサイズ(最大)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'file_size_min' => array(
			'name'	  	=> 'ファイルサイズ(最小)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		// ファイルアップロード期間
		'file_upload_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'file_upload_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'file_upload_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'file_upload_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'file_upload_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'file_upload_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'file_status' => array(
			'name'	 	 => '状態',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, file_status',
		),
		'sort_key' => array(
			'name'	  => 'ソートに使用するキー',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('所有ユーザID', 'MIMEタイプ', 'ファイルサイズ', 'アップロード日時'),
		),
		'sort_order' => array(
			'name'	  => 'ソート順',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('昇順', '降順'),
		),
	);
}

/**
 * 管理ファイル一覧実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminFileList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_file_list';
		
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
		return 'admin_file_list';
	}
}
?>