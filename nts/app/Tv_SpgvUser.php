<?php
/**
 * Tv_SpgvUser.php
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
class Tv_SpgvUserManager extends Ethna_AppManager
{
}

/**
 * SPGVユーザオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvUser extends Ethna_AppObject
{
	/**#@+
	 *  @access private
	 */
	/** @var	string  DB定義プレフィクス */
//	var $db_prefix = DB_SPGV;
	var $db_prefix = 'spgv';
	
	/**
	 *  @var	 array	テーブル
	 */
	var $table_def = array(
		'user' => array(
			'primary' => true,
		),
	);
}

?>