<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserLoginDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_mailaddress' => array(
			'name'		=> '�Ҏ��َ��Ďގڎ�',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//��ñ���������Ѥ�����ϥ��ɥ쥹�϶��ˤʤ�Τ�true�Ǥʤ���
		),
		'user_password' => array(
			'type'		=> VAR_TYPE_STRING,
//			'form_type'	=> FORM_TYPE_PASSWORD,//DoCoMo��password���ꤹ��ȿ����⡼�ɤˤʤäƤ��ޤ��Τǡ�FORM_TYPE_TEXT�ˡ�
			'form_type'	=> FORM_TYPE_TEXT,
//			'required'	=> true,//��ñ���������Ѥ�����ϥѥ���ɤ϶��ˤʤ�Τ�true�Ǥʤ���
		),
		'easy_login' => array(
			'name'		=> '��ñ������',
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	=> VAR_TYPE_STRING,
		),
		'guid' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
			'type'			=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼��������¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		
		//��ñ������
		if($this->af->get('easy_login')){
			// PC�ξ��
			if($GLOBALS['EMOJIOBJ']->carrier == 'PC'){
				//$this->ae->add(null, '', E_USER_IDENTIFY);
				//return 'user_index';
				return 'user_login';
			}
			//UID�����Ǥ��ʤ���Х�������̤˥�����쥯��
			if(!$xuid){
				$this->ae->add(null, '', E_USER_IDENTIFY);//UID�򥯥饤����Ȥ�������Ǥ��ʤ��ä�
				return 'user_login';
			}
			
			//��������UID�ǡ����ơ�����ͭ���Υ桼��������table:user�ˤ��뤫��ǧ
			$param = array(
				'sql_select'	=> ' user_uid, user_mailaddress, user_password ',
				'sql_from'		=> ' user ',
				'sql_where'		=> 'user_uid = ? AND user_status = ? ' ,
				'sql_values'	=> array( $xuid, 2 ),
			);
			$user = $um->dataQuery($param);
			
			//if($user[0] == 0){
			if(count($user) == 0){
				$this->ae->add(null, '', E_USER_IDENTIFY);//DB�ˤʤ��ä�
				return 'user_login';
			}
			
			//���饤����Ȥ����������UID��DB����UID��Ʊ��
			if($xuid == $user[0]['user_uid']){
				$userManager =& $this->backend->getManager('User');
				if($userManager->login($user[0]['user_mailaddress'],$user[0]['user_password'])){
					//��ʸ��ľ�Ԥ���TOP��Ƚ�Ǥ���
					// ���å�����cart_hash�����뤫��ǧ
					if($this->af->get('mode') == 'order' || $this->session->get('cart_hash') != ""){
						return 'user_ec_order_type';
					}else{
						return 'user_home';
					}
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
				//��ʸ��ľ�Ԥ���TOP��Ƚ�Ǥ���
				// ���å�����cart_hash�����뤫��ǧ
				if($this->session->get('cart_hash')){
					return 'user_ec_order_type';
				}else{
					return 'user_home';
				}
			}
			
			//ǧ��NG
			$this->ae->add(null, '', E_USER_LOGIN);
			return 'user_login';
		}
	}
}
?>