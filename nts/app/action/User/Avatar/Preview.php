<?php
/**
 * Preview.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х����ץ�ӥ塼���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarPreview extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'cart' => array(
			'name'		=> '�㤤ʪ�����������',
			'form_type' 	=> FORM_TYPE_SUBMIT,
		),
		'cart_avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
//			'required'	=> true,
			'name'		=> '�����Ď��ʎގ���ID',
		),
		'cmd' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
			'name'		=> '���ώݎĎ�',
		),
	);
}

/**
 * �桼�����Х����ץ�ӥ塼���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarPreview extends Tv_ActionUserOnly
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
		// �㤤ʪ�����������
		$avatar_id = $this->af->get('avatar_id');
		if($avatar_id && $this->af->get('cart')){
			// ���å���󤫤�桼��������������
			$user = $this->session->get('user');
			
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
				if($user['user_guest_status'] == 0){
					$this->ae->add(null, '', E_USER_AVATAR_INVALID);
					return 'user_error';
				}
				// ���Х������ƥ���ͥ���٤���-2�פξ�硢�����ȥ����åղ���ʳ��ϥ��������Ǥ��ʤ�
				if($ac->get('avatar_category_priority_id') == -2 && $user['user_guest_status'] != 2){
					$this->ae->add(null, '', E_USER_AVATAR_INVALID);
					return 'user_error';
				}
			}
			
			// ���å���󤫤饢�Х���������������
			$cart_avatar = $this->session->get('cart_avatar');
			
			// ���Х���ID�������㤤ʪ���������äƤ��ʤ����ɤ�����ǧ����
			if(is_array($cart_avatar)){
				foreach($cart_avatar as $k => $v){
					// �������󤬤�����Ϻ������
					if(!$v['avatar_id']){
						unset($cart_avatar[$k]);
						continue;
					}
					// ���äƤ������Ϥ��Τޤ�Preview�򸫤���
					if($v['avatar_id'] == $avatar_id){
						$this->ae->add('errors', "���Ύ��ʎގ����ϴ����㤤ʪ������������äƤ��ޤ���");
						return 'user_avatar_preview';
					}
				}
			}
			// ��ʣ���Х���������ǧ
			$ua =& new Tv_UserAvatar($this->backend);
			$ua_list =& $ua->searchProp(
				array('avatar_id'),
				array(
					'user_id'			=> $user['user_id'],
					'avatar_id'			=> $avatar_id,
					'user_avatar_status'		=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
				)
			);
			// ��ʣ���Ƥ�������㤤ʪ����������ʤ�
			if($ua_list[0] > 0){
				$this->ae->add(null, '', E_USER_AVATAR_DUPLICATE);
				return 'user_avatar_preview';
			}
			// ����Υ��Х���������ɲä���
			$cart_avatar[] = array('avatar_id' => $avatar_id, 'avatar_wear' => 1);
			// ���Х�������򥻥å����˥��åȤ���
			$this->session->set('cart_avatar', $cart_avatar);
		}
		
		// �����ȥ��Х��������/æ�����ơ���������
		$cart_avatar_id = $this->af->get('cart_avatar_id');
		if($cart_avatar_id){
			$cart_avatar = $this->session->get('cart_avatar');
			if(is_array($cart_avatar)){
				foreach($cart_avatar as $k => $v){
					// �������󤬤�����Ϻ������
					if(!$v['avatar_id']){
						unset($cart_avatar[$k]);
						continue;
					}
					// �����Υ��Х���������������ؤ���
					if($v['avatar_id'] == $cart_avatar_id){
						if($this->af->get('cmd')=='off'){
							// æ��
							$cart_avatar[$k]['avatar_wear'] = 0;
							$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
						}elseif($this->af->get('cmd')=='on'){
							// ���
							$cart_avatar[$k]['avatar_wear'] = 1;
							$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
						}
					}
				}
				// ���Х�������򥻥å����˥��åȤ���
				$this->session->set('cart_avatar', $cart_avatar);
			}
		}
		
		return 'user_avatar_preview';
	}
}

?>
