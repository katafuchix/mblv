<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ招待削除確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserInviteDeleteConfirm extends Tv_Form_UserInviteDeleteDo
{
}

/**
 * ユーザ招待削除確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserInviteDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'user_invite';
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
		// オブジェクトを取得する
		$o =& new Tv_Invite($this->backend,'invite_id',$this->af->get('invite_id'));
		$o->exportForm();
		
		return 'user_invite_delete_confirm';
	}
}
?>