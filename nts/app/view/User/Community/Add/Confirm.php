<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ追加確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityAddConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>
