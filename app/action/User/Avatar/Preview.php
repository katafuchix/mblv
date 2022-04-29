<?php
/**
 * Preview.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����ץ�ӥ塼���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
			'form_type' 	=> FORM_TYPE_SUBMIT,
		),
		'cart_avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
//			'required'	=> true,
		),
		'cmd' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
		),
	);
}

/**
 * �桼�����Х����ץ�ӥ塼���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
						$this->ae->add(null,'',E_USER_AVATAR_ALREADY_IN_CART);
						return 'user_avatar_preview';
					}
				}
			}
			// ��ʣ���Х���������ǧ
			$um = $this->backend->getManager('Util');
			$param = array(
				'sql_select'	=> ' avatar_id ',
				'sql_from'		=> ' user_avatar ',
				'sql_where'		=> ' user_id = ? AND avatar_id  = ? AND user_avatar_status <> ?',
				'sql_values'	=> array( $user['user_id'], $avatar_id, 0 ),
			);
			$ua_list = $um->dataQuery($param);
		
			// ��ʣ���Ƥ�������㤤ʪ����������ʤ�
			//if($ua_list[0] > 0){
			if(count($ua_list) > 0){
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