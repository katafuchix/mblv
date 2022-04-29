<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティ記事編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminCommunityArticleEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{	//記事情報の取得
		$articleObject =& new Tv_CommunityArticle($this->backend,'community_article_id',$this->af->get('community_article_id'));
		$articleObject->exportForm();
	}
}
?>
