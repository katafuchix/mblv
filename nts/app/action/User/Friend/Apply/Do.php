<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã�����¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendApplyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
		'friend_message' => array(
		),
		'confirm' => array(
		),
		'submit' => array(
		),
		'back' => array(
		),
		
	);
}

/**
 * �桼��ͧã�����¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendApplyDo extends Tv_ActionUserOnly
{
	/*
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			return 'user_friend_apply';
		}
		
		//����ͧã��󥯿����ѤߤΤФ����᤹
		$user = $this->session->get('user');
		$from_user_id = $user['user_id'];
		$tv_friend =& new Tv_Friend($this->backend);
		$user = $tv_friend->searchProp(
			array('friend_id'),
			array(
				'from_user_id' => $from_user_id,
				'to_user_id' => $this->af->get('to_user_id') 
			)
		);
		
		if($user[0] > 0){
			$this->ae->add(null, '', E_USER_FRIEND_APPLY_DUPLICATE);
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
		//ͧã����
		$fm = $this->backend->getManager('Friend');
		$fm->applyFriend();
		
		return 'user_friend_apply_done';
	}
}

?>
