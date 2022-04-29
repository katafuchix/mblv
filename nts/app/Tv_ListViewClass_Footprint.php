<?php
// vim: foldmethod=marker
/**
 *  Tv_ListViewClass_Footprint.php
 *
 *  @author     NAKAMURA Shota
 *  @package    Tv
 *  @version    $Id: app.viewclass.php 323 2006-08-22 15:52:26Z fujimoto $
 */
require_once('Pager/Pager.php');

// {{{ Tv_ListViewClass_Footprint
/**
 *  viewクラス
 *
 *  @author     {$author}
 *  @package    Tv
 *  @access     public
 */
class Tv_ListViewClass_Footprint extends Tv_ListViewClass
{
	/**
	 *  遷移名に対応する画面を出力する
	 *
	 *  特殊な画面を表示する場合を除いて特にオーバーライドする必要は無い
	 *  (preforward()のみオーバーライドすれば良い)
	 *
	 *  @access public
	 */
	function forward()
	{
		parent::forward();
		
		// 足跡をつける
		$footprintManager =& $this->backend->getManager('Footprint');
		$footprintManager->leave();
	}
}
// }}}
?>
