<?php

require_once 'Tv_Emoji.php';

/**
 *  Tv_Plugin_Validator_Length.php
 *
 *  @author	 Technovarth
 *  @package SNSV
 */

/**
 *  ��ʸ���б�ʸ����Ĺ���¥ץ饰����
 *
 *  @access	 public
 *  @package SNSV
 */
class Tv_Plugin_Validator_Length extends Ethna_Plugin_Validator
{
	/** @var	bool	����������뤫�ե饰 */
	var $accept_array = true;

	/**
	 *  ��ʸ�����θ����ʸ����Ĺ�Υ����å���Ԥ�
	 *
	 *  @access public
	 *  @param  string  $name	   �ե������̾��
	 *  @param  mixed   $var		�ե��������
	 *  @param  array   $params	 �ץ饰����Υѥ�᡼��
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
					$msg = "{form}������%dʸ���ʲ�(Ⱦ��%dʸ���ʲ�)�����Ϥ��Ʋ�����";
					return Ethna::raiseNotice($msg, E_FORM_MAX_STRING,
							array(intval($params['max']/2), $params['max']));
				}
				elseif($GLOBALS['EMOJIOBJ']->strlen_emoji($v) < $params['min'])
				{
					$msg = "{form}������%dʸ���ʾ�(Ⱦ��%dʸ���ʾ�)�����Ϥ��Ʋ�����";
					return Ethna::raiseNotice($msg, E_FORM_MIN_STRING,
							array(intval($params['min']/2), $params['min']));
				}
			}
		} else {
			$msg = "Length�ץ饰����Ϥ��η��ˤ��б����Ƥ��ޤ���";
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>
