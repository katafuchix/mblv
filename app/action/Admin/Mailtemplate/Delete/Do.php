<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メールテンプレート削除アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'mail_template_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理カテゴリ削除アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateDeleteDo extends Tv_ActionAdminOnly
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
		// mail_template_idからメールテンプレート削除（物理削除しない）
		$ac =& new Tv_MailTemplate($this->backend, 'mail_template_id', $this->af->get('mail_template_id'));
		$ac->set('mail_template_status', 0);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_mailtemplate_list';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_DELETE_DONE);
		$this->ae->add(null, 'メールテンプレートを削除しました。');
		return 'admin_mailtemplate_list';
	}
}
?>