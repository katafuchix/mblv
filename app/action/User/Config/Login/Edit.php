<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ簡単ログイン設定変更アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserConfigLoginEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * ユーザ簡単ログイン設定変更アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfigLoginEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		return 'user_config_login_edit';
	}
}
?>