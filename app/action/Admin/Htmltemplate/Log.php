<?php
/**
 * Log.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理HTMLテンプレートログアクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminHtmltemplateLog extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'html_template_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'name'		=> 'HTMLテンプレートID',
		),
	);
}

/**
 * 管理HTMLテンプレートログアクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminHtmltemplateLog extends Tv_ActionAdminOnly
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
		return 'admin_htmltemplate_log';
	}
}
?>