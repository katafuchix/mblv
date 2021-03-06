<?php
/**
 * Tv_View_Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 見ると足跡がつくページのビューの基底クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_view_Footprint extends Tv_ViewClass {
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// 足跡をつける
		$footprintManager =& $this->backend->getManager('Footprint');
		$footprintManager->leave();
	} 
} 
?>