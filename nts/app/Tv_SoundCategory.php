<?php
/**
 * Tv_SoundCategory.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * サウンドカテゴリマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SoundCategoryManager extends Ethna_AppManager
{
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
		case 'category':
			$ac =& new Tv_SoundCategory($this->backend);
			$result = $ac->searchProp(
				array('sound_category_id', 'sound_category_name'),
				array('sound_category_status' => 1),
				array('sound_category_id' => OBJECT_SORT_DESC)
			);
			$categoryList = array();
			foreach($result[1] as $item){
				$categoryList[$item['sound_category_id']] = array(
					'name' => $item['sound_category_name'],
				);
			}
			return $categoryList;
		default:
			return parent::getAttrList($attr_name);
		}
	}
}

/**
 * サウンドカテゴリオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_soundCategory extends Ethna_AppObject
{
}
?>