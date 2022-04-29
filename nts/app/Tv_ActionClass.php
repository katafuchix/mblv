<?php
/**
 * Tv_ActionClass.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * アクションクラスの基底クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionClass extends Ethna_ActionClass
{
	/**
	 * SNS情報セット
	 * 
	 * @access public
	 */
	function setSnsInfo()
	{
		//snsの基本情報をDBから取得しconfigへセット(config_idは1固定
		$sns_info =& new Tv_Config($this->backend,'config_id',1);
		$this->config->set('sns_info', $sns_info->getNameObject());
	}
	
	/**
	 * 認証
	 * 
	 * @access public
	 */
	function authenticate()
	{
		return parent::authenticate();
	}
}
?>