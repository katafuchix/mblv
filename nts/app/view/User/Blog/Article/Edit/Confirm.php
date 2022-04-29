<?php
/**
 * Cofirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記編集確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogArticleEditConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDENフォームを生成
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'back', 'add'));
		
		$this->af->setAppNE('hidden_vars', $hiddenVars);
	}
}
?>
