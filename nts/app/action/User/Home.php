<?php
/**
 * Home.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザマイページアクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserHome extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(

		);
}

/**
 * ユーザマイページアクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserHome extends Tv_ActionUserOnly
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
		return 'user_home';
	}
}

?>
