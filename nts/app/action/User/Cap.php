<?php
/**
 * Cap.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ画像認証アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCap extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
	);
}

/**
 * ユーザア画像認証クション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCap extends Tv_ActionUser
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
		//captcha
		$captcha = new KCAPTCHA();
		
		//セッションに格納
		$this->session->set('captcha_keystring', $captcha->getKeyString());
		
		return 'user_cap';
	}
}

?>
