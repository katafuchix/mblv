<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ファイル削除確認アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_AdminFileRemoveConfirm extends Tv_Form_AdminFileRemoveDo
{
}

/**
 * 管理ファイル削除確認アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFileRemoveConfirm extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate()) {
			return 'admin_file_search_result';
		}
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
		return 'admin_file_remove_confirm';
	}
}
?>