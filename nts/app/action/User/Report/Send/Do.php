<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ通報送信実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserReportSendDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'report_fail_user_id' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'report_message' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_TEXTAREA,
			'string_max_emoji'  => 2000,
		),
		'confirm' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'send' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
		'back' => array(
			'form_type' => FORM_TYPE_SUBMIT,
			'type'	  => VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ通報送信実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserReportSendDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// back or 検証エラーの場合
		if($this->af->get('back') != '' || $this->af->validate() > 0) return 'user_report_send';
		
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'user_report_send_done';
		
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
		// セッションからユーザ情報を取得
		$user = $this->session->get('user');
		// reportへ登録
		$o =& new Tv_Report($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('report_user_id', $user['user_id']);
		$o->set('report_status', 1);
		$o->set('report_regist_time', date('Y-m-d H:i:s'));
		$o->set('report_update_time', date('Y-m-d H:i:s'));
		$o->add();
		
		return 'user_report_send_done';
	}
}
?>