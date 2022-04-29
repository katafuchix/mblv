<?php
/**
 * Sent.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ送信メッセージ一覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserMessageListSent extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'page' => array(
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
	);
}
/**
 * ユーザ送信メッセージ一覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageListSent extends Tv_ActionUserOnly
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
		return 'user_message_list_sent';
	}
}
?>