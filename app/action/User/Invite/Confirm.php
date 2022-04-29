<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Գ�ǧ���������ե�����
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
 * �桼�����Գ�ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		if($this->af->validate() > 0) return 'user_invite';
		
		// ���ӤΤߤξ���PC�᡼�륢�ɥ쥹���Բ�
		if(
			$this->config->get('mobile_only')
			&&
			$GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($this->af->get('to_user_mailaddress')) == 'PC'
		){
			$this->ae->add(null, '', E_USER_INVITE_PCMAILADDRESS);
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
			}
		}
		
		// ���˾������򤬤��뤫�ɤ�����ǧ����
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