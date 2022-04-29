<?php
/**
 * Tv_ActionAdmin.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/** */
require_once 'Tv_ActionClass.php';

/**
 * 管理者がアクセスするアクションの基底クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionAdmin extends Tv_ActionClass
{
	/**
	 * 認証
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// 基本情報を取得する
		parent::setSnsInfo();
		
		return parent::authenticate();
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string 遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return parent::perform();
	}
}
?>