<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザデコメール購入画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserDecomailBuy extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// デコメール情報取得
		$a =& new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('decomail_id'));
		$a->exportForm();
	}
}
?>
