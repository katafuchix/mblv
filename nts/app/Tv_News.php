<?php
/**
 * Tv_News.php
 * 
 * @author Technovarth
 * @package SNSV
 */
define('NEWS_TYPE_TOP',			1);
define('NEWS_TYPE_AVATAR',		2);
define('NEWS_TYPE_DECOMAIL',	3);
define('NEWS_TYPE_GAME',		4);
define('NEWS_TYPE_SOUND',		5);
/**
 * ニュースマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_NewsManager extends Ethna_AppManager
{
}

/**
 * ニュースオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_News extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$this->set('news_status', 1);
		parent::add();
	}
}
?>