<?php
/**
 *  Tv_Plugin_Validator_Required.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

require_once 'Ethna/class/Plugin/Validator/Ethna_Plugin_Validator_Required.php';

/**
 *  必須フォームの検証プラグイン
 *
 *  （スペースのみの値は入力されていないとみなす。）
 *
 *  @access	 public
 *  @package SNSV
 */
 

class Tv_Plugin_Validator_Required extends Ethna_Plugin_Validator_Required
{
	/**
	 *  Ethna_Plugin_Validator::isEmptyのオーバーライド
	 */
	function isEmpty($var, $type)
	{
		if( $type != VAR_TYPE_FILE && is_scalar($var) ) {
			return (bool) preg_match('/^[\s　]*$/',$var);
		} else {
			return parent::isEmpty($var, $type);
		}
	}
}


?>