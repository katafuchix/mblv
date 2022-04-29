<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã�Ҳ�ʸ����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendIntroductionDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'from_user_id' => array(
			'required'	=> true,
		),
		'to_user_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * �桼��ͧã�Ҳ�ʸ����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendIntroductionDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$userSession = $this->session->get('user');
		
		if($this->af->validate() > 0){
			return 'user_home';
		}
		if($this->af->get('back')){
			return 'user_friend_introduction_list';
		}
		if($this->af->get('to_user_id') != $userSession['user_id'] &&
			$this->af->get('from_user_id') != $userSession['user_id'])
		{
			$this->ae->add(null, '', E_USER_FRIEND_INTRODUCTION_DENIED);
			return 'user_friend_introduction_list';
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
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($this->af->get('from_user_id'), $this->af->get('to_user_id'))
		);
		$friend->set('friend_introduction', '');
		$friend->update();
		
		return 'user_friend_introduction_delete_done';
	}
}
?>