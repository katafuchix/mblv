<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��ͧã����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
		'friend_message' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}
/**
 * �桼��ͧã����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if( $this->af->get('back') ) {
			$this->af->set('user_id',$this->af->get('to_user_id'));
			return 'user_profile_view';
		}
		if( $this->af->validate() > 0 ) {
			return  'user_friend_delete_confirm';
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
		$user = $this->session->get('user');		// ��ʬ�ΎՎ����ގ�ID
		$to_user_id = $this->af->get('to_user_id'); // ���ΎՎ����ގ�ID
		
		// friend_id�����
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' friend_id ',
			'sql_from'		=> ' friend ',
			'sql_where'		=> ' from_user_id = ? AND to_user_id = ? ',
			'sql_values'	=> array( $user['user_id'], $to_user_id ),
		);
		$friendList = $um->dataQuery($param);
		if( count($friendList) > 0 ) {
			$friend_id = $friendList[0]['friend_id'];
		}
		
		// �⤦��Ĥ�friend_id�����
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' friend_id ',
			'sql_from'		=> ' friend ',
			'sql_where'		=> ' from_user_id = ? AND to_user_id = ? ',
			'sql_values'	=> array( $to_user_id , $user['user_id'] ),
		);
		$friendList = $um->dataQuery($param);
		if( count($friendList) > 0 ) {
			$friend_rev_id = $friendList[0]['friend_id'];
		}
		
		// DB������
		$friend =& new Tv_Friend(
			$this->backend,
			'friend_id',
			$friend_id
		);
		if( $friend->isValid() ) {
			$friend->remove();
		}
		
		// �⤦������DB������
		$friend =& new Tv_Friend(
			$this->backend,
			'friend_id',
			$friend_rev_id
		);
		if( $friend->isValid() ) {
			$friend->remove();
		}
		
		$this->ae->add(null, '', I_USER_FRIEND_DELETE_DONE);
		
		return 'user_friend_list';
	}
}

?>