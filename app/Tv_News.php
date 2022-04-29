<?php
/**
 * Tv_News.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ニュースマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
define('NEWS_TYPE_AD',			1);
define('NEWS_TYPE_AVATAR',		2);
define('NEWS_TYPE_DECOMAIL',	3);
define('NEWS_TYPE_GAME',		4);
define('NEWS_TYPE_SOUND',		5);
define('NEWS_TYPE_TOP',			6);
class Tv_NewsManager extends Ethna_AppManager
{
}

/**
 * ニュースオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_News extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$this->set('news_status', 1);
		parent::add();
	}
}
?>