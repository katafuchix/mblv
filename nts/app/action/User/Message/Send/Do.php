<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザメッセージ送信実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserMessageSendDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'reply_message_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'message_title' => array(
			'required'  => true,
		),
		'message_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'send' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザメッセージ送信実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserMessageSendDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン
		if($this->af->get('back')) return 'user_message_send';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_message_send';
		
		// 二重投稿
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_message_send';
		}
		
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
		// メッセージ追加
		$message =& new Tv_Message($this->backend);
		$message->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$message->add();
		
		// メッセージハッシュをセット
		$this->af->setApp('message_hash', $message->get('message_hash'));
		
		// 返信だった場合は返信元のメッセージを返信済みにする
		if($this->af->get('reply_message_id') != ''){
			$message = new Tv_Message(
				$this->backend,
				'message_id',
				$this->af->get('reply_message_id')
			);
			$message->set('message_status_to', 4);	// 返信済み
			$message->update();
		}
		
		return 'user_message_send_done';
	}
}

?>
