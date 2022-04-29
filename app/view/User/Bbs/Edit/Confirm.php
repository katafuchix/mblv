<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言編集確認画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBbsEditConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// HIDDENフォームを生成
		$hidden_vars = $this->af->getHiddenVars(null, array('delete_image', 'confirm', 'back', 'update'));
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// 送信先ユーザ情報取得
		$toUser = &new Tv_User($this->backend, array('user_id'), $this->af->get('to_user_id'));
		$this->af->setApp('to_user', $toUser->getNameObject());
	}
}
?>