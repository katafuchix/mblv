<?php
/**
 * Send.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * メッセージ作成画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserMessageSend extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// 送信先ユーザ情報取得
		$to_user = &new Tv_User($this->backend,
			array('user_id'),
			$this->af->get('to_user_id')
			);
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}

?>
