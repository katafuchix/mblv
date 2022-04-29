<?php
/**
 * Avatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����Х����ݡ����륢�������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
 class Tv_Form_UserAvatar extends Tv_ActionForm
{
}

/**
 * �桼�����Х����ݡ����륢�������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatar extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// ���̤����򤵤�Ƥ��ʤ����ϥ��顼�ˤޤ魯
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		if(!$u->get('user_sex')){
			$this->ae->add(null, '', E_USER_AVATAR_SEX);
			return 'user_error';
		}
		
		// ���Х���������꤬��λ���Ƥ��ʤ����Ͻ��������̤�ɽ������
		if(!$u->get('avatar_config_first')){
			return 'user_avatar_config_first';
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
		return 'user_avatar';
	}
}
?>