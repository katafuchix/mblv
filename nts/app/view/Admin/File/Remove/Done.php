<?php
/**
 * Done.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ե��������¹Բ��̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminFileRemoveDone extends Tv_ViewClass
{
	function preforward()
	{
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'remove', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
	}
}

?>