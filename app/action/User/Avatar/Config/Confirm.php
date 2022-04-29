<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х��������ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserAvatarConfigConfirm extends Tv_Form_UserAvatarConfigDo
{
}

/**
 * �桼�����Х��������ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
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