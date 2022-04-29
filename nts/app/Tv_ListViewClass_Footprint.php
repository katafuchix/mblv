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
 *  view���饹
 *
 *  @author     {$author}
 *  @package    Tv
 *  @access     public
 */
class Tv_ListViewClass_Footprint extends Tv_ListViewClass
{
	/**
	 *  ����̾���б�������̤���Ϥ���
	 *
	 *  �ü�ʲ��̤�ɽ���������������ä˥����С��饤�ɤ���ɬ�פ�̵��
	 *  (preforward()�Τߥ����С��饤�ɤ�����ɤ�)
	 *
	 *  @access public
	 */
	function forward()
	{
		parent::forward();
		
		// ­�פ�Ĥ���
		$footprintManager =& $this->backend->getManager('Footprint');
		$footprintManager->leave();
	}
}
// }}}
?>
