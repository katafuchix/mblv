<?php
/**
 * Tv_ActionClass.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * アクションクラスの基底クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_ActionClass extends Ethna_ActionClass
{
	/**
	 * SNS情報セット
	 * 
	 * @access     public
	 */
	function setSnsInfo()
	{
		//基本情報をDBから取得しconfigへセット(config_idは1固定
		$site_info =& new Tv_Config($this->backend,'config_id',1);
		$this->config->set('site_info', $site_info->getNameObject());
	}
	
	/**
	 * 認証
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		return parent::authenticate();
	}
}
?>