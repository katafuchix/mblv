<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザブラックリスト登録確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'action/User/Blacklist/Add/Do.php';
class Tv_Form_UserBlacklistAddConfirm extends Tv_Form_UserBlacklistAddDo
{
}

/**
 * ユーザブラックリスト登録確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserBlacklistAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_blacklist_add';
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
		$hiddenVars = $this->af->getHiddenVars(null, array('confirm', 'submit', 'back'));
		$this->af->setAppNE('hidden_vars', $hiddenVars);
		return 'user_blacklist_add_confirm';
	}
}
?>