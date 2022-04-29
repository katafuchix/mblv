<?php
/**
 * Tv_Shop.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ショップマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ShopManager extends Ethna_AppManager
{
}

/**
 * ショップオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Shop extends Ethna_AppObject
{
	/**
	 *  オブジェクトプロパティ表示名へのアクセサ
	 *
	 *  @access     public
	 *  @param  string  $key	プロパティ名
	 *  @return string  プロパティの表示名
	 */
	function getName($key)
	{
		return $this->get($key);
	}
}
?>