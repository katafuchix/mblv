<?php
/**
 * Dl.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ǥ��᡼�����������ɲ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserDecomailDl extends Tv_ViewClass
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