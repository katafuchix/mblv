<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ招待確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserInviteConfirm extends Tv_Form_UserInviteDo
{
}

/**
 * ユーザ招待確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
		if($this->af->validate() > 0){
			$this->af->set('capword', '');
			return 'user_invite';
		}
		
		// 携帯のみの場合はPCメールアドレスは不可
		if(
			$this->config->get('mobile_only')
			&&
			$GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($this->af->get('to_user_mailaddress')) == 'PC'
		){
			$this->ae->add('errors', "PCﾒｰﾙｱﾄﾞﾚｽは招待できません。");
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
//				$to_user_id = $o->get('user_id');
//				$from_user_id = $sess['user_id'];
//				$f =& new Tv_Friend($this->backend);
//				$fList = $f->searchProp(
//					array('friend_id'),
//					array('from_user_id' => $from_user_id,'to_user_id' => $to_user_id)
//				);
//				if($fList[0] > 0){
//					$this->ae->add(null, '', E_USER_FRIEND_APPLY_DUPLICATE);
//					$this->af->set('capword', '');
//					return 'user_invite';
//				}
			}
		}
		
		// 過去に招待履歴があるかどうか確認する
		$i =& new Tv_Invite($this->backend);
		$iList = $i->searchProp(
			array('invite_id'),
//			array('from_user_id' => $from_user_id,'to_user_id' => $to_user_id,)
			array('to_user_mailaddress' => $this->af->get('to_user_mailaddress'))
		);
		if($iList[0] > 0){
			$this->ae->add(null, '', E_USER_INVITE_DUPLICATE);
			$this->af->set('capword', '');
			return 'user_invite';
		}
		
		//画像と入力文字が一致するか
		/* NAPATOWN
		if($this->af->get('capword') != $this->session->get('captcha_keystring')){
			$this->ae->add(null, '', E_USER_INVITE_CHAPCHA);
			$this->af->set('capword', '');
			return 'user_invite';
		}
		*/
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