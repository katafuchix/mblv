<?php
/**
 * Tv_ActionClass.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��������󥯥饹�δ��쥯�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ActionClass extends Ethna_ActionClass
{
	/**
	 * SNS���󥻥å�
	 * 
	 * @access     public
	 */
	function setSnsInfo()
	{
		//���ܾ����DB���������config�إ��å�(config_id��1����
		$site_info =& new Tv_Config($this->backend,'config_id',1);
		$this->config->set('site_info', $site_info->getNameObject());
	}
	
	/**
	 * ǧ��
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		return parent::authenticate();
	}
}
?>