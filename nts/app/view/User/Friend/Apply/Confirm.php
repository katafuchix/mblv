<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達申請確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendApplyConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDENフォームを生成
		$hidden_vars = $this->af->getHiddenVars(null,array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		// 申請先ユーザ情報を取得する
		$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
		$this->af->setApp('to_user', $to_user->getNameObject());
	}
}
?>
