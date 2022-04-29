<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理SNS基本情報編集実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminConfigEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		// 基本情報
		'sns_name' => array(
			'name'			=> 'SNS名',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_html_title' => array(
			'name'			=> 'HTMLタイトル',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_information' => array(
			'name'			=> 'お知らせ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_public_status' => array(
			'name'			=> '公開設定',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> array(1 => '公開制', 0 => '非公開制'),
		),
		'sns_maintenance_status' => array(
			'name'			=> 'メンテナンス設定',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> array(0 => '運営中', 1 => 'メンテナンス中'),
		),
		'sns_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_navi_template' => array(
			'name'			=> 'ナビゲーションテンプレート',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		// ポイント情報
		'sns_regist_point' => array(
			'name'			=> '入会時付与ポイント',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_invite_from_point' => array(
			'name'			=> '友達招待入会時付与ポイント（招待者）',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_invite_to_point' => array(
			'name'			=> '友達招待入会時付与ポイント（被招待者）',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// 配色情報
		'sns_bg_color'  => array(
			'name'			=> '背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_text_color' => array(
			'name'			=> '文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_link_color' => array(
			'name'			=> 'リンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_alink_color' => array(
			'name'			=> 'アクティブリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_vlink_color' => array(
			'name'			=> '訪問済みリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_title_bg_color' => array(
			'name'			=> 'タイトル背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_title_font_color' => array(
			'name'			=> 'タイトル文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_menu_color' => array(
			'name'			=> 'メニュー色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_time_color' => array(
			'name'			=> '時刻色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_form_name_color' => array(
			'name'			=> 'フォーム名色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_hr_color' => array(
			'name'			=> '水平線色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_pager_text_color' => array(
			'name'			=> 'ページャ文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_pager_bg_color' => array(
			'name'			=> 'ページャ背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'sns_error_color' => array(
			'name'			=> 'エラー文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// 端末管理
		'sns_low_term_d' => array(
			'name'			=> 'DOCOMO下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_low_term_a' => array(
			'name'			=> 'AU下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'sns_low_term_s' => array(
			'name'			=> 'SOFTBANK下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
	);
}
/**
 * 管理SNS基本情報編集実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminConfigEditDo extends Tv_ActionAdminOnly
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
		if($this->af->Validate() > 0) return 'admin_config_edit';
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
		// SNS情報更新
		$snsNews =& new Tv_Config($this->backend,'config_id',1);
		$snsNews->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// 更新
 		$r = $snsNews->update();
 		// 更新エラーの場合
 		if(Ethna::isError($r))return 'admin_config_edit';
		
		$this->ae->add("errors","基本情報編集が完了しました");
		return 'admin_config_edit';
	}
}
?>