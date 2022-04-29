<?php
/**
 * Send.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 通報メッセージ作成画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserReportSend extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 送信先ユーザ情報取得
		$to_user = &new Tv_User($this->backend, array('user_id'), $this->af->get('report_fail_user_id'));
		$this->af->setApp('report_fail_user', $to_user->getNameObject());
	}
}
?>