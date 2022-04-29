<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コンテンツ登録アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Add/Do.php';
class Tv_Form_AdminContentsAdd extends Tv_Form_AdminContentsAddDo
{
}

/**
 * 管理コンテンツ登録アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminContentsAdd extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return 'admin_contents_add';
	}
}
?>