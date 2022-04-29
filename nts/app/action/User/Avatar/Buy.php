<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarBuy extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * �桼�����Х���������������󥯥饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarBuy extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar';
		
		// ���å����������
		$sess = $this->session->get('user');
		
		// �桼�����������
		$u =& new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х���������꤬��λ���Ƥ��ʤ����Ͻ��������̤�ɽ������
		if(!$u->get('avatar_config_first')){
			return 'user_avatar_config_first';
		}
		
		// ���Х����������
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		if(!$a->isValid()){
			$this->ae->add(null, '', E_USER_AVATAR_INVALID);
			return 'user_error';
		}
		
		// ���Х������ƥ���������
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $a->get('avatar_category_id'));
		if(!$ac->isValid()){
			$this->ae->add(null, '', E_USER_AVATAR_INVALID);
			return 'user_error';
		}
		// ������������
		// ���Х������ƥ���ͥ���٤���1�װʲ��ξ��
		if($ac->get('avatar_category_priority_id') < 1){
			// ���̲���ϥ��������Ǥ��ʤ�
			if($sess['user_guest_status'] == 0){
				$this->ae->add(null, '', E_USER_AVATAR_INVALID);
				return 'user_error';
			}
			// ���Х������ƥ���ͥ���٤���-2�פξ�硢�����ȥ����åղ���ʳ��ϥ��������Ǥ��ʤ�
			if($ac->get('avatar_category_priority_id') == -2 && $sess['user_guest_status'] != 2){
				$this->ae->add(null, '', E_USER_AVATAR_INVALID);
				return 'user_error';
			}
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
		return 'user_avatar_buy';
	}
}

?>
