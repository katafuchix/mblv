<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザログアウト実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserLogoutDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
	);
}
/**
 * ユーザログアウト実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserLogoutDo extends Tv_ActionUserOnly
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
		// ログアウトフラグを立てる
		$this->af->setApp('logout', true);
		// セッションを破棄
		$this->session->destroy();
		
		$this->ae->add(null, '', I_USER_LOGOUT_DONE);
		return 'user_index';
	}
}
?>