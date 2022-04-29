<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ受信メッセージ削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserMessageDeleteReceivedDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'message_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'submit' => array(
		),
	);
}

/**
 * ユーザ受信メッセージ削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserMessageDeleteReceivedDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$message =& new Tv_Message(
			$this->backend,
			'message_id',
			$this->af->get('message_id')
		);
		
		if( !$message->isValid() ) {
			$this->ae->add(null, '', E_USER_MESSAGE_NOT_FOUND);
			return 'user_error';
		}
		
		if($this->af->get('back') != '' || $this->af->validate() > 0)
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
		$message =& new Tv_Message(
			$this->backend,
			'message_id',
			$this->af->get('message_id')
		);
		
		if($message->get('message_status_from') == 3){
			/* 差出人、受取人双方が削除したとき物理削除 */
			$message->remove();
		}else{
			$message->set('message_status_to', 3);
			$message->update();
		};
		
		$this->ae->add(null, $this->af->getFtName('message') , I_USER_MESSAGE_DELETE_DONE);
		return 'user_message_list_received';
	}
}
?>