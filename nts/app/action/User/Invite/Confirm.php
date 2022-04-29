<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Գ�ǧ���������ե�����
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
 * �桼�����Գ�ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserInviteConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0){
			$this->af->set('capword', '');
			return 'user_invite';
		}
		
		// ���ӤΤߤξ���PC�᡼�륢�ɥ쥹���Բ�
		if(
			$this->config->get('mobile_only')
			&&
			$GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($this->af->get('to_user_mailaddress')) == 'PC'
		){
			$this->ae->add('errors', "PC�Ҏ��َ��Ďގڎ��Ͼ��ԤǤ��ޤ���");
			return 'user_invite';
		}
		
		// ��ʬ���鼫ʬ�ؤξ��Ԥ��Բ�
		$sess = $this->session->get('user');
		if($sess['user_mailaddress'] == $this->af->get('to_user_mailaddress')){
			$this->ae->add(null, '', E_USER_INVITE_MAILADDRESS);
			$this->af->set('capword', '');
			return 'user_invite';
		}
		
		// �ܲ�����ɤ�����ǧ����
		$o =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('to_user_mailaddress'));
		// ������������
		if($o->isValid()){
			// �ܲ���ξ��
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
		
		// ���˾������򤬤��뤫�ɤ�����ǧ����
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
		
		//����������ʸ�������פ��뤫
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
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		return 'user_invite_confirm';
	}
}

?>