<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ通報送信確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'action/User/Report/Send/Do.php';
class Tv_Form_UserReportSendConfirm extends Tv_Form_UserReportSendDo
{
}

/**
 * ユーザ通報送信確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserReportSendConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->get('back')){
			$this->af->set('user_id', $this->af->get('report_fail_user_id'));
			return 'user_profile_view';
		}
		if($this->af->validate() > 0) return 'user_report_send';
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
		return 'user_report_send_confirm';
	}
}
?>