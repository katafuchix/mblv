<?php
/**
 * Tv_SpgvPoint.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * SPGVポイントマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvPointManager extends Ethna_AppManager
{
}

/**
 * SPGVポイントオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_SpgvPoint extends Ethna_AppObject
{
	/**#@+
	 *  @access private
	 */
	/** @var	string  DB定義プレフィクス */
	var $db_prefix = 'spgv';
	
	/**
	 *  @var	 array	テーブル
	 */
	var $table_def = array(
		'point' => array(
			'primary' => true,
		),
	);
}

?>