<?php
/**
 * Reply.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザメッセージ返信アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserMessageReply extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'reply_message_id' => array(
		),
		'reply' => array(
		),
	);
}

/**
 * ユーザメッセージ返信アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageReply extends Tv_ActionUserOnly
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
			return 'user_message_view_received';
		
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
		/* 返信元メッセージの取得 */
		$message =& new Tv_Message(
			$this->backend,
			'message_id',
			$this->af->get('reply_message_id')
		);
		
		if( !$message->isValid() ) {
			$this->ae->add(null, '', E_USER_MESSAGE_NOT_FOUND);
			return 'user_error';
		}
		
		$this->af->set('to_user_id', $message->get('from_user_id'));
		$this->af->set('message_title', 'Re:' . $message->get('message_title'));
		$body = '>' . str_replace("\n", "\n>", $message->get('message_body'));
		$this->af->set('message_body', $body);
		
		return 'user_message_send';
	}
}
?>