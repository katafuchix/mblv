<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ記事追加画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserCommunityArticleAdd extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$community =& new Tv_Community(
			$this->backend,
			'community_id',
			$this->af->get('community_id')
		);
		$this->af->setApp('community', $community->getNameObject());
	}
}
?>
