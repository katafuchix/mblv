<?php
/**
 * Tv_UserSpgv.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * SPGVユーザマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSpgvManager extends Ethna_AppManager
{
}

/**
 * ユーザオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSpgv extends Ethna_AppObject
{
	/**#@+
	 *  @access private
	 */
	/** @var	string  DB定義プレフィクス */
	var $db_prefix = SPGV_DB;
}

?>