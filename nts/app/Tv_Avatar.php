<?php
/**
 * Tv_Avatar.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * アバターマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_AvatarManager extends Ethna_AppManager
{
	function getAttrList($attr_name)
	{
		switch($attr_name)
		{
		case 'sex_type':
			$status_list = array(
				'0'	=> array('name' => '男女'),
				'1'	=> array('name' => '男のみ'),
				'2'	=> array('name' => '女のみ'),
			);
			return $status_list;
		case 'image_status':
			$status_list = array(
				''	=> array('name' => '変更しない'),
				'edit'	=> array('name' => '変更する'),
				'delete'	=> array('name' => '削除する'),
			);
			return $status_list;
		default:
			return parent::getAttrList($attr_name);
		}
	}
}

/**
 * アバターオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Avatar extends Ethna_AppObject
{
}
?>