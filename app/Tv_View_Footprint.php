<?php
/**
 * Tv_View_Footprint.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����­�פ��Ĥ��ڡ����Υӥ塼�δ��쥯�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_view_Footprint extends Tv_ViewClass {
	/**
	 * ����ɽ��������
	 * 
	 * @access     public
	 */
	function preforward()
	{
		// ­�פ�Ĥ���
		$footprintManager =& $this->backend->getManager('Footprint');
		$footprintManager->leave();
	} 
} 
?>