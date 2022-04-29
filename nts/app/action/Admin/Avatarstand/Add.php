<?php
/**
 * .php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバター台座ー登録アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Add/Do.php';
class Tv_Form_AdminAvatarstandAdd extends Tv_Form_AdminAvatarstandAddDo
{
}

/**
 * 管理アバター台座登録アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarstandAdd extends Tv_ActionAdminOnly
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
		return 'admin_avatarstand_add';
	}
}
?>