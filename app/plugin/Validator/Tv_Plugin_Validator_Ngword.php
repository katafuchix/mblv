<?php

/**
 *  Tv_Plugin_Validator_Ngword.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  NGワードバリデータ
 *
 *  @access	 public
 *  @package    MBLV
 */
class Tv_Plugin_Validator_Ngword extends Ethna_Plugin_Validator
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
		$type = $this->getFormType($name);
		if(!$params || $this->isEmpty($var, $type)){
			return true;
		}
		
		if($type == VAR_TYPE_STRING){
			$config = $this->backend->getConfig();
			//$sns_info = $config->get('sns_info');
			$sns_info = & new Tv_Config($this->backend,'config_type','config');
			//$ng_words = explode("\n", $sns_info['sns_ngword']);
			$ng_words = explode("\n", $sns_info->get('site_ngword'));
			// 絵文字を排除する
			$var = preg_replace('/\[.*?:.*?\]/', '', $var);
			
			foreach(to_array($var) as $v){
				// NGワード
				foreach($ng_words as $ng_word){
					// NGワードが入っているか？
					// if(mb_stripos($v, trim($ng_word)) !== false){
					// PHP 5.2.x以上ではmb_striposが使用できるが PHP 5.1.6では使用できないためstriposを使用するためにコメント
					if(stripos($v, trim($ng_word)) !== false){
						$msg = "投稿できない単語が含まれています。({$ng_word})";
						return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
					}
				}
			}
		} else {
			$msg = 'VAR_TYPE_STRING以外には対応していません';
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
	
	// 文字列の出力した位置を数値で返す関数 JavaのindexOfの真似
	function indexOf($haystack, $needle, $offset="") { 
		return strpos($haystack, $needle, $offset); 
	} 
}
?>