<?php
/**
 * Tv_DecomailCategory.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �f�R���[���J�e�S���}�l�[�W��
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_DecomailCategoryManager extends Ethna_AppManager
{
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
		case 'category':
			$ac =& new Tv_DecomailCategory($this->backend);
			$result = $ac->searchProp(
				array('decomail_category_id', 'decomail_category_name'),
				array('decomail_category_status' => 1),
				array('decomail_category_id' => OBJECT_SORT_DESC)
			);
			$categoryList = array();
			foreach($result[1] as $item){
				$categoryList[$item['decomail_category_id']] = array(
					'name' => $item['decomail_category_name'],
				);
			}
			return $categoryList;
		default:
			return parent::getAttrList($attr_name);
		}
	}
}

/**
 * �f�R���[���J�e�S���I�u�W�F�N�g
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_DecomailCategory extends Ethna_AppObject
{
}
?>