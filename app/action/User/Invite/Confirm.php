<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ招待確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserInviteConfirm extends Tv_Form_UserInviteDo
{
}

/**
 * ユーザ招待確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserInviteConfirm extends Tv_ActionUserOnly
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
		if($this->af->validate() > 0) return 'user_invite';
		
		// 携帯のみの場合はPCメールアドレスは不可
		if(
			$this->config->get('mobile_only')
			&&
			$GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($this->af->get('to_user_mailaddress')) == 'PC'
		){
			$this->ae->add(null, '', E_USER_INVITE_PCMAILADDRESS);
			return 'user_invite';
		}
		
		// 自分から自分への招待は不可
		$sess = $this->session->get('user');
		if($sess['user_mailaddress'] == $this->af->get('to_user_mailaddress')){
			$this->ae->add(null, '', E_USER_INVITE_MAILADDRESS);
			$this->af->set('capword', '');
			return 'user_invite';
		}
		
		// 本会員かどうか確認する
		$o =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('to_user_mailaddress'));
		// 該当がある場合
		if($o->isValid()){
			// 本会員の場合
			if($o->get('user_status')==2){
				$this->ae->add(null, '', E_USER_INVITE_VALID_USER);
				return 'user_invite';
			}
		}
		
		// 過去に招待履歴があるかどうか確認する
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' invite_id ',
			'sql_from'		=> ' invite ',
			'sql_where'		=> 'to_user_mailaddress = ? ',
			'sql_values'	=>  array($this->af->get('to_user_mailaddress')),
		);
		$iList = $um->dataQuery($param);
		
		//if($iList[0] > 0){
		if(count($iList) > 0){
			$this->ae->add(null, '', E_USER_INVITE_DUPLICATE);
			return 'user_invite';
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
		return 'user_invite_confirm';
	}
}
?>