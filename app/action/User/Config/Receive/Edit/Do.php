<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ設定変更実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserConfigReceiveEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_message_1_status' => array(
		),
		'user_message_2_status' => array(
		),
//		'user_message_3_status' => array(
//		),
//		'user_message_4_status' => array(
//		),
		'edit' => array(
			'name'		=> '　変更する　',
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}
/**
 * ユーザ設定変更実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserConfigReceiveEditDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'user_config_receive_edit';
		
		return null;
	}
	
	function perform()
	{
		// セッション情報を取得
		$sess = $this->session->get('user');
		
		// メール受信設定をアップデートする
		$o =& new Tv_User($this->backend,'user_id',$sess['user_id']);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->update();
		
		return 'user_config_receive_edit_done';
	}
}
?>