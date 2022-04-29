<?php

/**
 *  Tv_Plugin_Validator_Ngword.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  NGワードバリデータ
 *
 *  @access	 public
 *  @package SNSV
 */
class Tv_Plugin_Validator_Ngword extends Ethna_Plugin_Validator
{
	/** @var	bool	配列を受け取るかフラグ */
	var $accept_array = true;

	/**
	 *  文字列のチェックを行う
	 *
	 *  @access public
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
		
		// 管理画面からの編集はNGワードのチェックを行わない
		$access_key = "";
		// access_key(リクエストされたアクション名)
		foreach($this->backend->controller->action as $key => $value) {
			$access_key = $this->backend->controller->action[$key]['class_name'];
			break;
		}
		if($GLOBALS['EMOJIOBJ']->carrier == 'PC' && ereg('Admin',$access_key)){
			return true;
		}
		
		if($type == VAR_TYPE_STRING){
			// NGワード集を取得する
			$config = $this->backend->getConfig();
			$sns_info = $config->get('sns_info');
			$ng_words = $sns_info['sns_ngword'];
			// NGワードをUTF8に変換
			$ng_words = mb_convert_encoding($ng_words, 'UTF-8', 'EUC-JP');
			$ng_words = explode("\n", $ng_words);
			
			// 絵文字を排除する
			$var = preg_replace('/\[.*?:.*?\]/', '', $var);
			
			foreach(to_array($var) as $v){
				// 今回検査するフォーム値をUTF8に変換
				$v = mb_convert_encoding($v, 'UTF-8', 'EUC-JP');
				// NGワード
				foreach($ng_words as $ng_word){
					$ng_word = trim($ng_word);
//@error_log(trim($ng_word),3,'/home/technovarth/tmp_snsv/_'.date("Ymd").".log");
//					if(mb_stripos($v, trim($ng_word)) !== false){
					if($v && $ng_word){
						if(strstr($v, $ng_word)){
//						if(preg_match('/' . quotemeta($ng_word) . '/', $v)){
							// エラーに表示させるNGワードをEUC-JPに戻す
							$ng_word = mb_convert_encoding($ng_word, 'EUC-JP', 'UTF-8');
							$msg = "投稿できない単語が含まれています。({$ng_word})";
							return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
						}
					}
				}
			}
		} else {
			$msg = 'VAR_TYPE_STRING以外には対応していません';
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>
