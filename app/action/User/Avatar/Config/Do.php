<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х�������¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarConfigDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'first_avatar_id' => array(
			'name'		=> '1���ܤΎ��ʎގ���ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'second_avatar_id' => array(
			'name'		=> '2���ܤΎ��ʎގ���ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'submit' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼�����Х�������¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarConfigDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���
		if($this->af->get('back')) return 'user_avatar_config_first';
		// ���ڥ��顼
		if($this->af->validate()>0) return 'user_avatar_config_first';
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
		// ���Х�������
		// ���å����������
		$sess = $this->session->get('user');
		
		$timestamp = date("Y-m-d H:i:s");
		// ���ʤΤǹ����ݥ��������Ϻ������ʤ�
		
		// ��1���Х�������
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('first_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// ��Ƥ������
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// ��1���Х����ۿ���λ�����꤬����Ƥ���С�-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('first_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		// ��2���Х�������
		$ua = new Tv_UserAvatar($this->backend);
		$ua->set('user_id', $sess['user_id']);
		$ua->set('avatar_id', $this->af->get('second_avatar_id'));
		$ua->set('user_avatar_status', 1);
		$ua->set('user_avatar_wear', 1);// ��Ƥ������
		$ua->set('user_avatar_created_time', $timestamp);
		$ua->set('user_avatar_updated_time', $timestamp);
		$r = $ua->add();
		if(Ethna::isError($r)) return 'user_avatar_config_first';
		
		// ��2���Х����ۿ���λ�����꤬����Ƥ���С�-1
		$a = new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('second_avatar_id'));
		if($a->get('avatar_stock_status')){
			$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
			$r = $a->update();
			if(Ethna::isError($r)) return 'user_avatar_config_first';
		}
		
		
		// ���å������Υ��Х����㤤ʪ���������õ�
		$this->session->set('cart_avatar', '');
		
		// �桼������򹹿�
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х��������������򹹿�
		$u->set('avatar_config_first', 1);
		$r = $u->update();
		// ���å�������򹹿�
		$this->session->set('user', $u->getNameObject());
		
		return 'user_avatar_config_done';
	}
}
?>