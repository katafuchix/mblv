<?php
/**
 * Done.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ファイル削除実行画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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