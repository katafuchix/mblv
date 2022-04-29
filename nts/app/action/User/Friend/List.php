<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã�������������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
		),
	);
}

/**
 * �桼��ͧã�������������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendList extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return 'user_home';
		
		// ï��ͧã������������뤫��
		$user_session = $this->session->get('user');
		// user_id�����ꤵ��Ƥʤ����ϼ�ʬ��ͧã������ɽ������
		$user_id = ($this->af->get('user_id') == '') ? $user_session['user_id'] : $this->af->get('user_id');
		$user =& new Tv_User($this->backend, 'user_id', $user_id);
		// $user�������Ǥ��ʤ� or ��Ͽ��桼���ǤϤʤ� ���
		if($user->isValid() == false || $user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
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
		return 'user_friend_list';
	}
}
?>