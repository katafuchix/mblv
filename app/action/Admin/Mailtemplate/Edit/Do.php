<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メールテンプレート編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'mail_template_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'メールテンプレートID',
		),
		'mail_template_code' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> 'メールテンプレート名',
			'option'		=> 'Util, mail_template',
		),
		'mail_template_title' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> 'メールテンプレートタイトル',
		),
		'mail_template_body' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> 'メールテンプレート本文',
		),
	);
}

/**
 * 管理メールテンプレート編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_mailtemplate_edit';
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
		// パラメタ重複確認
		$o =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		// 過去の自分のパラメタと今回の自分のパラメタが異なる場合のみ確認処理を行う
		if($this->af->get('mail_template_code') != $o->get('mail_template_code')){
			$o =& new Tv_MailTemplate($this->backend);
			$result = $o->searchProp(
				array('mail_template_id'),
				array('mail_template_status' => 1, 'mail_template_code' => new Ethna_AppSearchObject($this->af->get('mail_template_code'), OBJECT_CONDITION_EQ)),
				array('mail_template_id' => OBJECT_SORT_DESC)
			);
			if($result[0] > 0){
//				$this->ae->add(null, '', E_ADMIN_MAIL_TEMPLATE_CODE_DUPLICATE);
				$this->ae->add(null, 'メールテンプレート名が重複しています。');
				return 'admin_mailtemplate_edit';
			}
		}
		// mail_template_idからメールテンプレート編集
		$o =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_mailtemplate_edit';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_EDIT_DONE);
		$this->ae->add(null, 'メールテンプレートの編集が完了しました。');
		return 'admin_mailtemplate_list';
	}
}
?>