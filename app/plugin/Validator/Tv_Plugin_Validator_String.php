<?php

require_once 'Tv_Emoji.php';

/**
 *  Tv_Plugin_Validator_String.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

/**
 *  ʸ�����ѥХ�ǡ���
 *
 *  @access	 public
 *  @package    MBLV
 */
class Tv_Plugin_Validator_String extends Ethna_Plugin_Validator
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
		$true = true;
		$type = $this->getFormType($name);
		if ($this->isEmpty($var, $type)) {
			return $true;
		}

		if($type == VAR_TYPE_STRING) {
			foreach (to_array($var) as $v) {
				// ��ʸ���б�����Ĺ����
				if(isset($params['max_emoji']) &&
					$GLOBALS['EMOJIOBJ']->strlen_emoji($v) > $params['max_emoji'])
				{
					$msg = "{form}������%dʸ���ʲ�(Ⱦ��%dʸ���ʲ�)�����Ϥ��Ʋ�����";
					return Ethna::raiseNotice($msg, E_FORM_MAX_STRING,
							array(intval($params['max_emoji']/2), $params['max_emoji']));
				}
				// ��ʸ���б��Ǿ�Ĺ����
				if(isset($params['min_emoji']) &&
					$GLOBALS['EMOJIOBJ']->strlen_emoji($v) < $params['min_emoji'])
				{
					$msg = "{form}������%dʸ���ʾ�(Ⱦ��%dʸ���ʾ�)�����Ϥ��Ʋ�����";
					return Ethna::raiseNotice($msg, E_FORM_MIN_STRING,
							array(intval($params['min_emoji']/2), $params['min_emoji']));
				}
			}
		} else {
			$msg = "VAR_TYPE_STRING�ʳ��ˤ��б����Ƥ��ޤ���";
			return Ethna::raiseNotice($msg, E_FORM_INVALIDVALUE);
		}
		
		return true;
	}
}
?>