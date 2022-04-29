<?php
/**
 * First.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х�������ڡ���1���������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarConfigFirst extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}
/**
 * �桼�����Х�������ڡ���1���������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigFirst extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// ���å����������
		$sess = $this->session->get('user');
		
		// �桼����������
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// ���Х�������������򤬤��뤫�ɤ�����ǧ
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "���ˎ��ʎގ���������꤬��λ���Ƥ��ޤ���");
			return 'user_error';
		}
		
		return 'user_avatar_config_first';
	}
}

?>
