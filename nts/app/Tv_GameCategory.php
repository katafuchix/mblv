<?php
/**
 * Tv_GameCategory.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ゲームカテゴリマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_GameCategoryManager extends Ethna_AppManager
{
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
		case 'category':
			$ac =& new Tv_GameCategory($this->backend);
			$result = $ac->searchProp(
				array('game_category_id', 'game_category_name'),
				array('game_category_status' => 1),
				array('game_category_id' => OBJECT_SORT_DESC)
			);
			$categoryList = array();
			foreach($result[1] as $item){
				$categoryList[$item['game_category_id']] = array(
					'name' => $item['game_category_name'],
				);
			}
			return $categoryList;
		default:
			return parent::getAttrList($attr_name);
		}
	}
}

/**
 * ゲームカテゴリオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_GameCategory extends Ethna_AppObject
{
}
?>