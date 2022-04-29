<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ記事削除確認画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserBlogArticleDeleteConfirm extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 日記オブジェクトを取得
		$o =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$o->exportform();
	}
}
?>