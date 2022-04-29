<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言登録確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'action/User/Bbs/Add/Do.php';
class Tv_Form_UserBbsAddConfirm extends Tv_Form_UserbbsAddDo
{
}

/**
 * ユーザ伝言登録確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsAddConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン
		if($this->af->get('back')){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			return 'user_profile_view';
		}
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_bbs_add';
		
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
		return 'user_bbs_add_confirm';
	}
}
?>