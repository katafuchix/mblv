<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ǥ��᡼��������̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserDecomailBuy extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		// �ǥ��᡼��������
		$a =& new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('decomail_id'));
		$a->exportForm();
	}
}
?>
