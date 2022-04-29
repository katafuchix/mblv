<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ記事削除確認画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		// コミュニティ記事オブジェクトを取得
		$o = new Tv_CommunityArticle($this->backend, 'community_article_id', $this->af->get('community_article_id'));
		$o->exportform();
	}
}
?>
