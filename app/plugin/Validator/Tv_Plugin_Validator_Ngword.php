<?php

/**
 *  Tv_Plugin_Validator_Ngword.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  NG��ɥХ�ǡ���
 *
 *  @access	 public
 *  @package    MBLV
 */
class Tv_Plugin_Validator_Ngword extends Ethna_Plugin_Validator
{
	/** @var	bool	����������뤫�ե饰 */
	var $accept_array = true;

	/**
	 *  ʸ����Υ����å���Ԥ�
	 *
	 *  @access     public
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
		
		if($type == VAR_TYPE_STRING){
			$config = $this->backend->getConfig();
			//$sns_info = $config->get('sns_info');
			$sns_info = & new Tv_Config($this->backend,'config_type','config');
			//$ng_words = explode("\n", $sns_info['sns_ngword']);
			$ng_words = explode("\n", $sns_info->get('site_ngword'));
			// ��ʸ�����ӽ�����
			$var = preg_replace('/\[.*?:.*?\]/', '', $var);
			
			foreach(to_array($var) as $v){
				// NG���
				foreach($ng_words as $ng_word){
					// NG��ɤ����äƤ��뤫��
					// if(mb_stripos($v, trim($ng_word)) !== false){
					// PHP 5.2.x�ʾ�Ǥ�mb_stripos�����ѤǤ��뤬 PHP 5.1.6�Ǥϻ��ѤǤ��ʤ�����stripos����Ѥ��뤿��˥�����
					if(stripos($v, trim($ng_word)) !== false){
						$msg = "��ƤǤ��ʤ�ñ�줬�ޤޤ�Ƥ��ޤ���({$ng_word})";
						return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
					}
				}
			}
		} else {
			$msg = 'VAR_TYPE_STRING�ʳ��ˤ��б����Ƥ��ޤ���';
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
	
	// ʸ����ν��Ϥ������֤���ͤ��֤��ؿ� Java��indexOf�ο���
	function indexOf($haystack, $needle, $offset="") { 
		return strpos($haystack, $needle, $offset); 
	} 
}
?>