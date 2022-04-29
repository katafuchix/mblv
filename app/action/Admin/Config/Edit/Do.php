<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理基本情報編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		// 基本情報
		'site_name' => array(
			'name'			=> 'サイト名',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_company_name' => array(
			'name'			=> 'サイト運営会社',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_phone' => array(
			'name'			=> 'サイト運営会社電話番号',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_type' => array(
			'name'			=> 'タイプ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
		'site_html_title' => array(
			'name'			=> 'HTMLタイトル',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_information' => array(
			'name'			=> 'お知らせ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_public_status' => array(
			'name'			=> '公開設定',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'			=> array(1 => '公開制', 0 => '非公開制'),
		),
		'site_maintenance_status' => array(
			'name'			=> 'メンテナンス設定',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'required'		=> true,
			'option'			=> array(0 => '運営中', 1 => 'メンテナンス中'),
		),
		'site_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_navi_template' => array(
			'name'			=> 'ナビゲーションテンプレート',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		// ポイント情報
		'site_regist_point' => array(
			'name'			=> '入会時付与ポイント',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'site_invite_from_point' => array(
			'name'			=> '友達招待入会時付与ポイント（招待者）',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'site_invite_to_point' => array(
			'name'			=> '友達招待入会時付与ポイント（被招待者）',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// 配色情報
		'site_bg_color'  => array(
			'name'			=> '背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_text_color' => array(
			'name'			=> '文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_link_color' => array(
			'name'			=> 'リンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_alink_color' => array(
			'name'			=> 'アクティブリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_vlink_color' => array(
			'name'			=> '訪問済みリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_title_bg_color' => array(
			'name'			=> 'タイトル背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_title_font_color' => array(
			'name'			=> 'タイトル文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_menu_color' => array(
			'name'			=> 'メニュー色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_time_color' => array(
			'name'			=> '時刻色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_form_name_color' => array(
			'name'			=> 'フォーム名色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_hr_color' => array(
			'name'			=> '水平線色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_pager_text_color' => array(
			'name'			=> 'ページャ文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_pager_bg_color' => array(
			'name'			=> 'ページャ背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		'site_error_color' => array(
			'name'			=> 'エラー文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
		// 端末管理
		'site_low_term_d' => array(
			'name'			=> 'DOCOMO下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_low_term_a' => array(
			'name'			=> 'AU下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_low_term_s' => array(
			'name'			=> 'SOFTBANK下位端末',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'site_cms_html1' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '上部HTML',
		),
		'site_cms_html2' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '下部HTML',
		),
		'site_cms_html3' => array(
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '中部HTML',
		),
	);
}

/**
 * 管理SNS基本情報編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// site_typeがconfigでない場合
		if($this->af->get('site_type') != 'config'){
			// 入力必須制限を外す
			$required = array(
				'site_name',
				'site_company_name',
				'site_phone',
				'site_type',
				'site_html_title',
				'site_information',
				'site_public_status',
				'site_maintenance_status',
				'site_meta_description',
				'site_meta_keywords',
				'site_meta_robots',
				'site_meta_author',
				'site_navi_template',
				'site_invite_from_point',
				'site_invite_to_point',
			);
			foreach($required as $v){
				if($v) $this->af->form[$v]['required'] = false;
			}
		}
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
		// 基本情報更新
		$o =& new Tv_Config($this->backend,'config_type',$this->af->get('site_type'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// 更新
 		$r = $o->update();
 		// 更新エラーの場合
 		if(Ethna::isError($r))return 'admin_config_edit';
		
		$site_type = $this->config->get('site_type');
		$this->ae->add(null, '', I_ADMIN_CONFIG_EDIT_DONE);
		return 'admin_config_edit';
	}
}
?>