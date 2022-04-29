<?php

require_once 'Tv_Emoji.php';

/**
 *  Tv_Plugin_Validator_String.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  文字列用バリデータ
 *
 *  @access	 public
 *  @package    MBLV
 */
class Tv_Plugin_Validator_String extends Ethna_Plugin_Validator
{
	/** @var	bool	配列を受け取るかフラグ */
	var $accept_array = true;

	/**
	 *  文字列のチェックを行う
	 *
	 *  @access     public
	 *  @param  string  $name	   フォームの名前
	 *  @param  mixed   $var		フォームの値
	 *  @param  array   $params	 プラグインのパラメータ
	 */
	function &validate($name, $var, $params)
	{
		$true = true;
		$type = $this->getFormType($name);
		if ($this->isEmpty($var, $type)) {
			return $true;
		}

		if($type == VAR_TYPE_STRING) {
			foreach (to_array($var) as $v) {
				// 絵文字対応最大長制限
				if(isset($params['max_emoji']) &&
					$GLOBALS['EMOJIOBJ']->strlen_emoji($v) > $params['max_emoji'])
				{
					$msg = "{form}は全角%d文字以下(半角%d文字以下)で入力して下さい";
					return Ethna::raiseNotice($msg, E_FORM_MAX_STRING,
							array(intval($params['max_emoji']/2), $params['max_emoji']));
				}
				// 絵文字対応最小長制限
				if(isset($params['min_emoji']) &&
					$GLOBALS['EMOJIOBJ']->strlen_emoji($v) < $params['min_emoji'])
				{
					$msg = "{form}は全角%d文字以上(半角%d文字以上)で入力して下さい";
					return Ethna::raiseNotice($msg, E_FORM_MIN_STRING,
							array(intval($params['min_emoji']/2), $params['min_emoji']));
				}
			}
		} else {
			$msg = "VAR_TYPE_STRING以外には対応していません";
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>