<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理モール基本情報編集実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcConfigEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'mall_name' => array(
			'name'			=> 'モール名',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_html_title' => array(
			'name'			=> 'HTMLタイトル',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_information' => array(
			'name'			=> 'お知らせ',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
/*		'mall_public_flg' => array(
			'name'			=> '公開設定',
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_RADIO,
			'option'		=> array(1 => '公開', 0 => '非公開'),
		),
*/
		'mall_shop_ranking' => array(
			'name'			=> 'ショップランキング',
			'type'			=> VAR_TYPE_STRING,
			//'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			//'option'		=> array(1 => '公開', 0 => '非公開'),
		),
		'mall_meta_description' => array(
			'name'			=> 'META Description',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_keywords' => array(
			'name'			=> 'META Keywords',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_robots' => array(
			'name'			=> 'META robots',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_meta_author' => array(
			'name'			=> 'META author',
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_contents_body' => array(
			'name'			=> 'モール用フリースペース',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
  'mall_bg_color' => array(
			'name'			=> 'モール背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),     
  'mall_text_color' => array(
			'name'			=> 'モール文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
  'mall_link_color' => array(
			'name'			=> 'モールリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_alink_color' => array(
			'name'			=> 'モールアクティブリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_vlink_color' => array(
			'name'			=> 'モール訪問済みリンク色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'mall_title_bg_color' => array(
			'name'			=> 'モールタイトル背景色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_title_font_color' => array(
			'name'			=> 'モールタイトル文字色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_menu_color' => array(
			'name'			=> 'モールメニュー色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 
		'mall_hr_color' => array(
			'name'			=> 'モールHR色',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		), 

	);
}

/**
 * 管理モール基本情報編集実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */

class Tv_Action_AdminEcConfigEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->Validate() > 0) return 'master_config_edit';
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
		// モール情報更新
		$o =& new Tv_Config($this->backend,'config_id',1);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
 		// 更新
 		$r = $o->update();
 		
 		// 更新エラーの場合
 		if(Ethna::isError($r)) return 'admin_ec_config_edit';
		
		$this->ae->add("errors","モール基本情報編集完了しました。");
		return 'admin_ec_config_edit';
	}
}
?>