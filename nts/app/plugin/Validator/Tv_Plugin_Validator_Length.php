<?php

require_once 'Tv_Emoji.php';

/**
 *  Tv_Plugin_Validator_Length.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  絵文字対応文字列長制限プラグイン
 *
 *  @access	 public
 *  @package SNSV
 */
class Tv_Plugin_Validator_Length extends Ethna_Plugin_Validator
{
	/** @var	bool	配列を受け取るかフラグ */
	var $accept_array = true;

	/**
	 *  絵文字を考慮して文字列長のチェックを行う
	 *
	 *  @access public
	 *  @param  string  $name	   フォームの名前
	 *  @param  mixed   $var		フォームの値
	 *  @param  array   $params	 プラグインのパラメータ
	 */
	function &validate($name, $var, $params)
	{
		$true = true;
		$type = $this->getFormType($name);
		if (isset($params['max']) == false || $this->isEmpty($var, $type)) {
			return $true;
		}
		
		if($type == VAR_TYPE_STRING) {
			foreach (to_array($var) as $v) {
				if($GLOBALS['EMOJIOBJ']->strlen_emoji($v) > $params['max'])
				{
					$msg = "{form}は全角%d文字以下(半角%d文字以下)で入力して下さい";
					return Ethna::raiseNotice($msg, E_FORM_MAX_STRING,
							array(intval($params['max']/2), $params['max']));
				}
				elseif($GLOBALS['EMOJIOBJ']->strlen_emoji($v) < $params['min'])
				{
					$msg = "{form}は全角%d文字以上(半角%d文字以上)で入力して下さい";
					return Ethna::raiseNotice($msg, E_FORM_MIN_STRING,
							array(intval($params['min']/2), $params['min']));
				}
			}
		} else {
			$msg = "Lengthプラグインはこの型には対応していません";
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>
