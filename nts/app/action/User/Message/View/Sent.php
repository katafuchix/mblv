<?php
/**
 * Sent.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ送信済みメッセージ閲覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserMessageViewSent extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'message_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * ユーザ送信済みメッセージ閲覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserMessageViewSent extends Tv_ActionUserOnly
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
			return 'user_message_list_sent';
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
		return 'user_message_view_sent';
	}
}

?>
