<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã�Ҳ�ʸ�Խ����������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendIntroductionEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * �桼��ͧã�Ҳ�ʸ�Խ����������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendIntroductionEdit extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'user_home';
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
		$userSession = $this->session->get('user');
		
		$friend =& new Tv_Friend(
			$this->backend,
			array('to_user_id', 'from_user_id'),
			array($this->af->get('to_user_id'), $userSession['user_id'])
		);
		if(!$friend->isValid() || $friend->get('friend_status') != 2){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			$this->ae->add(null, '', E_USER_FRIEND_INTRODUCTION_DENIED);
			return 'user_profile_view';
		}
		$this->af->set('friend_introduction', $friend->get('friend_introduction'));
		
		return 'user_friend_introduction_edit';
	}
}

?>
