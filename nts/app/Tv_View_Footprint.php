<?php
/**
 * Tv_View_Footprint.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����­�פ��Ĥ��ڡ����Υӥ塼�δ��쥯�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_view_Footprint extends Tv_ViewClass {
	/**
	 * ����ɽ��������
	 * 
	 * @access public 
	 */
	function preforward()
	{
		// ­�פ�Ĥ���
		$footprintManager =& $this->backend->getManager('Footprint');
		$footprintManager->leave();
	} 
} 

?>
