<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザ伝言削除確認画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBbsDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// オブジェクトを取得
		$message =& new Tv_Bbs($this->backend, 'bbs_id', $this->af->get('bbs_id'));
		$message->exportform();
	}
}
?>