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
 * �˥塼���ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_NewsManager extends Ethna_AppManager
{
}

/**
 * �˥塼�����֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_News extends Ethna_AppObject
{
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function add()
	{
		$this->set('news_status', 1);
		parent::add();
	}
}
?>