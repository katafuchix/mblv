<?php
/**
 * Cofirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ日記追加確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserBlogArticleAddConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// HIDDENフォームを生成
		$hidden_vars = $this->af->getHiddenVars(null, array());
		
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>
