<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ招待実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserInviteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_mailaddress' => array(
			'name'		=> '相手のﾒｰﾙｱﾄﾞﾚｽ',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
			'required'	=> true,
			'custom'	=> 'checkMailaddress',
		),
		'message' => array(
			'name'		=> 'ﾒｯｾｰｼﾞ(任意)',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
			'ngword'	=> true,
		),
		'send' => array(
			'name'		=> '　は　い　',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'		=> '　いいえ　',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ユーザ招待実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserInviteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0 || $this->af->get('back') != '') return 'user_invite';
		
		// 二重投稿エラー
		if(Ethna_Util::isDuplicatePost()) {
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_invite';
		}
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		//友達のメールアドレスへ招待メールを送信
		$invite =& $this->backend->getManager('Invite');
		$invite->invite();
		
		return 'user_invite_done';
	}
}
?>