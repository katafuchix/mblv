<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザメッセージ受信ステータス変更アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserConfigReceiveEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * ユーザメッセージ受信ステータス変更アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfigReceiveEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		// セッション情報を取得
		$sess = $this->session->get('user');
		// ユーザ情報を取得
		$user =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		if(!$user->isValid()) return 'user_home';
		$user->exportForm();
		
		return 'user_config_receive_edit';
	}
}
?>