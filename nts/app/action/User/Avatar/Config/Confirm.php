<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х��������ǧ���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserAvatarConfigConfirm extends Tv_Form_UserAvatarConfigDo
{
}

/**
 * �桼�����Х��������ǧ���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigConfirm extends Tv_ActionUserOnly
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
		if($this->af->validate()>0) return 'user_avatar_config_second';
		return null;
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function perform()
	{
		// ���å����������
		$sess = $this->session->get('user');
		
		// �桼����������
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х�������������򤬤��뤫�ɤ�����ǧ
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "���ˎ��ʎގ���������꤬��λ���Ƥ��ޤ���");
			return 'user_error';
		}
		
		// �ץ�ӥ塼��ɽ�������륢�Х����ѤΥ��å�������Ѥ���
		$cart_avatar = array(
			array('avatar_id' => $this->af->get('first_avatar_id'), 'avatar_wear' => 1),
			array('avatar_id' => $this->af->get('second_avatar_id'), 'avatar_wear' => 1),
		);
		$this->session->set('cart_avatar', $cart_avatar);
		
		return 'user_avatar_config_confirm';
	}
}

?>
