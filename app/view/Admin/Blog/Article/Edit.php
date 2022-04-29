<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理日記編集画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminBlogArticleEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{	//記事情報の取得
		$articleObject =& new Tv_BlogArticle($this->backend,'blog_article_id',$this->af->get('blog_article_id'));
		$articleObject->exportForm();
	}
}
?>