<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コメント編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommentEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		//記事情報の取得
		$articleObject =& new Tv_Comment($this->backend,'comment_id',$this->af->get('comment_id'));
		$articleObject->exportForm();
	}
}
?>
