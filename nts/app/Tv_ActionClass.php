<?php
/**
 * Tv_ActionClass.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ��������󥯥饹�δ��쥯�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionClass extends Ethna_ActionClass
{
	/**
	 * SNS���󥻥å�
	 * 
	 * @access public
	 */
	function setSnsInfo()
	{
		//sns�δ��ܾ����DB���������config�إ��å�(config_id��1����
		$sns_info =& new Tv_Config($this->backend,'config_id',1);
		$this->config->set('sns_info', $sns_info->getNameObject());
	}
	
	/**
	 * ǧ��
	 * 
	 * @access public
	 */
	function authenticate()
	{
		return parent::authenticate();
	}
}
?>