<?php

/**
 *  Tv_Plugin_Validator_Ngword.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  NG��ɥХ�ǡ���
 *
 *  @access	 public
 *  @package SNSV
 */
class Tv_Plugin_Validator_Ngword extends Ethna_Plugin_Validator
{
	/** @var	bool	����������뤫�ե饰 */
	var $accept_array = true;

	/**
	 *  ʸ����Υ����å���Ԥ�
	 *
	 *  @access public
	 *  @param  string  $name	   �ե������̾��
	 *  @param  mixed   $var		�ե��������
	 *  @param  array   $params	 �ץ饰����Υѥ�᡼��
	 */
	function &validate($name, $var, $params)
	{
		$type = $this->getFormType($name);
		if(!$params || $this->isEmpty($var, $type)){
			return true;
		}
		
		// �������̤�����Խ���NG��ɤΥ����å���Ԥ�ʤ�
		$access_key = "";
		// access_key(�ꥯ�����Ȥ��줿���������̾)
		foreach($this->backend->controller->action as $key => $value) {
			$access_key = $this->backend->controller->action[$key]['class_name'];
			break;
		}
		if($GLOBALS['EMOJIOBJ']->carrier == 'PC' && ereg('Admin',$access_key)){
			return true;
		}
		
		if($type == VAR_TYPE_STRING){
			// NG��ɽ����������
			$config = $this->backend->getConfig();
			$sns_info = $config->get('sns_info');
			$ng_words = $sns_info['sns_ngword'];
			// NG��ɤ�UTF8���Ѵ�
			$ng_words = mb_convert_encoding($ng_words, 'UTF-8', 'EUC-JP');
			$ng_words = explode("\n", $ng_words);
			
			// ��ʸ�����ӽ�����
			$var = preg_replace('/\[.*?:.*?\]/', '', $var);
			
			foreach(to_array($var) as $v){
				// ���󸡺�����ե������ͤ�UTF8���Ѵ�
				$v = mb_convert_encoding($v, 'UTF-8', 'EUC-JP');
				// NG���
				foreach($ng_words as $ng_word){
					$ng_word = trim($ng_word);
//@error_log(trim($ng_word),3,'/home/technovarth/tmp_snsv/_'.date("Ymd").".log");
//					if(mb_stripos($v, trim($ng_word)) !== false){
					if($v && $ng_word){
						if(strstr($v, $ng_word)){
//						if(preg_match('/' . quotemeta($ng_word) . '/', $v)){
							// ���顼��ɽ��������NG��ɤ�EUC-JP���᤹
							$ng_word = mb_convert_encoding($ng_word, 'EUC-JP', 'UTF-8');
							$msg = "��ƤǤ��ʤ�ñ�줬�ޤޤ�Ƥ��ޤ���({$ng_word})";
							return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
						}
					}
				}
			}
		} else {
			$msg = 'VAR_TYPE_STRING�ʳ��ˤ��б����Ƥ��ޤ���';
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>
