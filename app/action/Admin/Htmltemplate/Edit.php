<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理HTMLテンプレート編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminHtmltemplateEdit extends Tv_Form_AdminHtmltemplateEditDo
{
}

/**
 * 管理HTMLテンプレート編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminHtmltemplateEdit extends Tv_ActionAdminOnly
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
		// html_template_idから情報取得
		$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
		$o->exportForm();
		
		// 編集開始
		$timestamp = date("Y-m-d H:i:s");
		$o->set('html_template_edit_start_time', $timestamp);
		$o->set('html_template_edit', 1);
		$r = $o->update();
		
		// テンプレート本体はファイル内のコンテンツを採用
		$_template = BASE . '/template/' . TEMPLATE . '/user/' . $o->get('html_template_code') . '.tpl';
		$template = file_get_contents($_template);
		$this->af->set('html_template_body', $template);
		
		return 'admin_htmltemplate_edit';
	}
}
?>