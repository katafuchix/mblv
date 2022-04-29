<?php
/**
 * Edit.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティ記事編集画面ビュークラス
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_View_UserCommunityArticleEdit extends Tv_ViewClass
{
	/**
	 *	画面表示前処理
	 *
	 *	@access 	public
	 */
	function preforward()
	{
		// トピックを取得
		$article =& new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$this->af->get('community_article_id')
		);
		$this->af->setApp('article', $article->getNameObject());
	}
}
?>