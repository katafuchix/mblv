<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザ伝言登録確認画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBbsAddConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDENフォーム生成
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'send', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		
		// 送信先ユーザ情報取得
		$toUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
	}
}
?>