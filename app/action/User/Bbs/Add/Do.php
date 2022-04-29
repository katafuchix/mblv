<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBbsAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'bbs_body' => array(
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
 * ユーザ伝言登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン、検証エラー
		if($this->af->get('back') != '' || $this->af->validate() > 0) return 'user_bbs_add';
		
		// 二重投稿エラー
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_bbs_add';
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
		// 伝言オブジェクトを追加する
		$message =& new Tv_Bbs($this->backend);
		$message->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 自分以外の書き込みでは新着フラグをつける
		if($user['user_id'] != $this->af->get('to_user_id')){
			$message->set('bbs_notice',1);
		}
		// オーバーライド
		$message->add();
		
		//伝言があることをユーザーにEメールでお知らせ start
		$user = $this->session->get('user');
		// 自分自身の書き込みの場合は送らない
		if($user['user_id'] != $this->af->get('to_user_id')){
			$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
			// メール受信設定を確認
			if($to_user->get('user_message_1_status')){
				$ms = new Tv_Mail($this->backend);
				// パラメタを生成
				$to_user_nickname = $to_user->get('user_nickname');
				$to_user_mailaddress = $to_user->get('user_mailaddress');
				$to_user_hash = $to_user->get('user_hash');
				$value = array (
					'user_hash'		=> $to_user_hash,
					'from_user_nickname'	=> $user['user_nickname'],
					'to_user_nickname'	=> $to_user_nickname,
				);
				$ms->sendOne($to_user_mailaddress , 'user_bbs' , $value );
			}
		}
		// 伝言があることをユーザーにEメールでお知らせ end
		
		// Viewへ返却する情報
		$this->af->setApp('bbs_hash', $message->get('bbs_hash'));
		
		return 'user_bbs_add_done';
	}
}
?>