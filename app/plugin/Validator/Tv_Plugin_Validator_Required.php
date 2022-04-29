<?php
/**
 *  Tv_Plugin_Validator_Required.php
 *
 *  @author	 Technovarth
 *  @package    MBLV
 */

require_once 'Ethna/class/Plugin/Validator/Ethna_Plugin_Validator_Required.php';

/**
 *  ɬ�ܥե�����θ��ڥץ饰����
 *
 *  �ʥ��ڡ����Τߤ��ͤ����Ϥ���Ƥ��ʤ��Ȥߤʤ�����
 *
 *  @access	 public
 *  @package    MBLV
 */


class Tv_Plugin_Validator_Required extends Ethna_Plugin_Validator_Required
{
	/**
	 *  Ethna_Plugin_Validator::isEmpty�Υ����С��饤��
	 */
	function isEmpty($var, $type)
	{
		if( $type != VAR_TYPE_FILE && is_scalar($var) ) {
			return (bool) preg_match('/^[\s��]*$/',$var);
		} else {
			return parent::isEmpty($var, $type);
		}
	}
}

?>