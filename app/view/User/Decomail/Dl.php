<?php
/**
 * Dl.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザデコメールダウンロード画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserDecomailDl extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// デコメール情報取得
		$a =& new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('decomail_id'));
		$a->exportForm();
	}
}
?>