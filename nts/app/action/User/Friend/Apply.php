<?php
/**
 * Apply.php
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
class Tv_Form_UserFriendApply extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
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
class Tv_Action_UserFriendApply extends Tv_ActionUserOnly
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
		$user = $this->session->get('user');
		
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($user['user_id'], $this->af->get('to_user_id'))
		);
		
		if($friend->isValid()){
			switch($friend->get('friend_status')){
				case 1:
					$this->ae->add(null, '', E_USER_FRIEND_APPLY_DUPLICATE);
					return 'user_error';
				case 2:
					$this->ae->add(null, '', E_USER_FRIEND_DUPLICATE);
					return 'user_error';
				case 3:
					$friend->remove();	// ��Îގ�����õ�
					break;
			}
		}
		return 'user_friend_apply';
	}
}
?>