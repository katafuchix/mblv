<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザパスワード変更アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigPassEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * ユーザパスワード変更アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigPassEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		return 'user_config_pass_edit';
	}
}

?>
