<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 通報メッセージ送信内容確認画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserReportSendConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$hiddenVars = $this->af->getHiddenVars(
			null,
			array('confirm', 'send', 'back')
			);
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// 送信先ユーザ情報取得
		$failUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('report_fail_user_id'));
		$this->af->setApp('report_fail_user', $failUser->getNameObject());
	}
}
?>