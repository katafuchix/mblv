<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザパスワード請求アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserRemindDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_mailaddress' => array(
			'name'		=> 'ﾒｰﾙｱﾄﾞﾚｽ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'custom'	=> 'checkMailaddress',
		),
	);
}

/**
 * ユーザパスワード請求アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserRemindDo extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_remind';
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
		// パスワード請求
		$o =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('user_mailaddress'));
		if($o->get('user_status') == 2){
			// メール送信
			$m = new Tv_Mail($this->backend);
			$value = array (
				'user_hash'	=> $o->get('user_hash'),
				'user_password'	=> $o->get('user_password'),
			);
			$m->sendOne($this->af->get('user_mailaddress'), 'user_remind', $value );
		}
		// メールアドレスが登録されているかどうかが分かってしまうので，
		// ユーザが登録されていない場合でも同じメッセージを表示する
		$this->ae->add(null, '', I_USER_REMIND_DONE);
		
		return 'user_remind_done';
	}
}

?>
