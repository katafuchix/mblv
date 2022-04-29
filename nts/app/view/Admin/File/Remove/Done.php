<?php
/**
 * Done.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ファイル削除実行画面ビュークラス
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