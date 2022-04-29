<?php
/**
 * Edit.php
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
require_once 'Edit/Do.php';
class Tv_Form_AdminMailtemplateEdit extends Tv_Form_AdminMailtemplateEditDo
{
}

/**
 * 管理メールテンプレート編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateEdit extends Tv_ActionAdminOnly
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
		// mail_template_idから広告情報取得
		$o =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		$o->exportForm();
		return 'admin_mailtemplate_edit';
	}
}
?>