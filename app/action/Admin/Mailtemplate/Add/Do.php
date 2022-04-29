<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理メールテンプレート登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMailtemplateAddDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
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
 * 管理メールテンプレート登録アクション実行クラス
 *
 * メールテンプレートを登録します
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMailtemplateAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_mailtemplate_add';
		
		// 2重POST対応
		if (Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'admin_mailtemplate_list';
		}
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
		// メールテンプレート登録
		$o =& new Tv_MailTemplate($this->backend);
		// パラメタ重複確認
		$result = $o->searchProp(
			array('mail_template_id'),
			array('mail_template_status' => 1, 'mail_template_code' => new Ethna_AppSearchObject($this->af->get('mail_template_code'), OBJECT_CONDITION_EQ)),
			array('mail_template_id' => OBJECT_SORT_DESC)
		);
		if($result[0] > 0){
//			$this->ae->add(null, '', E_ADMIN_MAIL_TEMPLATE_CODE_DUPLICATE);
			$this->ae->add(null, 'メールテンプレート名が重複しています。');
			return 'admin_mailtemplate_add';
		}
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('mail_template_status', 1);
		// 登録
		$r = $o->add();
		//登録エラーの場合
		if(Ethna::isError($r)) return 'admin_mailtemplate_list';
		
//		$this->ae->add(null, '', I_ADMIN_MAIL_TEMPLATE_CODE_ADD_DONE);
		$this->ae->add(null, 'メールテンプレートの登録が完了しました。');
		return 'admin_mailtemplate_list';
	}
}
?>