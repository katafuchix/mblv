<?php
/**
 * Category.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティカテゴリ変更画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminConfigCommunityCategory extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// コミュニティカテゴリリストを取得
		
		$cca =& new Tv_CommunityCategory($this->backend);
		$category_list =& $cca->searchProp(
			array('community_category_id', 'community_category_name','community_category_priority_id'),
			array('community_category_status' => 1),
			array('community_category_id' => OBJECT_SORT_ASC)
		);
		$this->af->setApp('category_list', $category_list[1]);
	}
}
?>