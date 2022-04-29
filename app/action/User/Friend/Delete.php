<?php
/**
 * Delete.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendDelete extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
	);
}

/**
 * �桼��ͧã������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendDelete extends Tv_ActionUserOnly
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
			array( 'from_user_id', 'to_user_id' ),
			array( $user['user_id'], $this->af->get('to_user_id') )
		);
		
		if( $friend->isValid() )
		{
			switch( $friend->get('friend_status') )
			{
				case 1:
					$this->ae->add(null, '', E_USER_FRIEND_APPLYING);
					return 'user_error';
				case 3:
					$this->ae->add(null, '', E_USER_FRIEND_DELETE_DONE);
					$friend->remove();	// ��Îގ�����õ�
					return 'user_error';
			}
		}
		else
		{
			$this->ae->add(null, '', E_USER_FRIEND_NOT_FRIEND);
			return 'user_error';
		}
		
		return 'user_friend_delete';
	}
}

?>