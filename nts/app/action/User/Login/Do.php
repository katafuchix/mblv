<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserLoginDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_mailaddress' => array(
			'name'		=> '�Ҏ��َ��Ďގڎ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//��ñ�ێ��ގ��ݤ���Ѥ�����ϥ��ɥ쥹�϶��ˤʤ�Τ�true�Ǥʤ���
		),
		'user_password' => array(
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//��ñ�ێ��ގ��ݤ���Ѥ�����ϥѥ���ɤ϶��ˤʤ�Τ�true�Ǥʤ���
		),
		'easy_login' => array(
			'name'		=> '��ñ�ێ��ގ���',
//			'name'		=> 'easy login',
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼��������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserLoginDo extends Tv_ActionUser
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_login';
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
		$um =& $this->backend->getManager('Util');
		$xuid = $um->getXuid();
		$sm = $this->backend->getManager('Stats');
		
		//��ñ�ێ��ގ���
		if($this->af->get('easy_login')){
			//UID�����Ǥ��ʤ���Ўێ��ގ��ݲ��̤˥�����쥯��
			if(!$xuid){
				$this->ae->add(null, '', E_USER_IDENTIFY);//UID�򥯥饤����Ȥ�������Ǥ��ʤ��ä�
				return 'user_login';
			}
			
			//��������UID�ǡ����ơ�����ͭ���Υ桼��������table:user�ˤ��뤫��ǧ
			$tv_user =& new Tv_User($this->backend);
			$user = $tv_user->searchProp(
				array('user_id','user_uid','user_mailaddress','user_password'),
				array('user_uid' => $xuid,'user_status' => 2 ));
			if($user[0] == 0){
				$this->ae->add(null, '', E_USER_IDENTIFY);//DB�ˤʤ��ä�
				return 'user_login';
			}
			
			//���饤����Ȥ����������UID��DB����UID��Ʊ��
			if($xuid == $user[1][0]['user_uid']){
				$userManager =& $this->backend->getManager('User');
				if($userManager->login($user[1][0]['user_mailaddress'],$user[1][0]['user_password'])){
					//return 'user_home';
					$sm->addStats('login', $user[1][0]['user_id'], 0, 0);
					return 'user_top';
				}
			}
			
			//���곰���顼
			$this->ae->add(null, '', E_USER_IDENTIFY);
			return 'user_login';
			
		}else{
			$userManager =& $this->backend->getManager('User');
			
			//ǧ��
			if($userManager->login($this->af->get('user_mailaddress'), $this->af->get('user_password'))){
				// PC���Ƥ�����Ȥ�
				if($this->config->get('mobile_only'))
				{
					$user_session = $this->session->get('user');
					if(!$user_session['user_guest_status'] && $GLOBALS['EMOJIOBJ']->carrier == 'PC'){
						// �����ȤǤϤʤ��Τ˥������Ȥ�����
						$userManager->logout();
						//ǧ��NG
						$this->ae->add(null, '', E_USER_LOGIN_MOBILE_ONLY);
						return 'user_login';
					}
				}
				//return 'user_home';
				$sess = $this->session->get('user');
				$sm->addStats('login', $sess['user_id'], 0, 0);
				return 'user_top';
			}
			
			//ǧ��NG
			$this->ae->add(null, '', E_USER_LOGIN);
			return 'user_login';
		}
	}
}

?>
