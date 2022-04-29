<?php
/**
 * Do.php
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
class Tv_Form_AdminHtmltemplateEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'html_template_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'HTMLテンプレートID',
		),
		'html_template_code' => array(
			'form_type' => FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'HTMLテンプレートコード',
		),
		'html_template_body' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'HTMLテンプレート本文',
		),
		'edit' => array(
		),
	);
}

/**
 * 管理HTMLテンプレート編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminHtmltemplateEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_htmltemplate_edit';
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
		$timestamp = date("Y-m-d H:i:s");
		
		// 保存しない場合
		if(!$this->af->get('edit')){
			// html_template_idからHTMLテンプレート編集
			$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
			$o->set('html_template_edit', 0);
			$o->set('html_template_edit_end_time', $timestamp);
			// 更新
			$r = $o->update();
			// 更新エラーの場合
			if(Ethna::isError($r)) return 'admin_htmltemplate_edit';
			
			// フォーム値のクリア
			$this->af->clearFormVars();
			
//			$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
			$this->ae->add(null, 'HTMLテンプレートの編集を中止しました。');
			return 'admin_htmltemplate_list';
		}
		
		// html_template_idからHTMLテンプレート編集
		$o =& new Tv_HtmlTemplate($this->backend, 'html_template_id', $this->af->get('html_template_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('html_template_edit', 0);
		$o->set('html_template_edit_end_time', $timestamp);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_htmltemplate_edit';
		
		// HTMLテンプレートコード
		$html_template_code = $o->get('html_template_code');
		// HTMLテンプレート
		$template = $o->get('html_template_body');
		
		// HTMLテンプレートログ追加
		$o = new Tv_HtmlTemplateLog($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('html_template_id', $this->af->get('html_template_id'));
		$o->set('html_template_code', $html_template_code);
		$o->set('html_template_updated_time', $timestamp);
		$r = $o->add();
		
/*
		// ローカルにファイルを保存
		$_template = BASE . '/template/' . TEMPLATE . '/user/' . $html_template_code . '.tpl';
		$fp = fopen($_template, "w");
		$size = fwrite($fp, $template);
		fclose($fp);
		chmod($file, 0644);
		
		// FTP接続でテンプレートファイルをアップロード
		$um = $this->backend->getManager('Util');
		$um->ftpUpload($_template, $_template);
*/
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
		$this->ae->add(null, 'HTMLテンプレートの編集が完了しました。');
		return 'admin_htmltemplate_list';
	}
}
?>