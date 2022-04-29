<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��ͧã��󥯾�ǧ�¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendAcceptDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'friend_id' => array(
			'required'	=> true,
		),
		'accept' => array(
			'required'	=> true,
		),
	);
}

/**
 * �桼��ͧã��󥯾�ǧ�¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendAcceptDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_friend_accept';
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
		// ͧã���֥������ȼ���
		$friend =& new Tv_Friend($this->backend, 'friend_id', $this->af->get('friend_id'));
		// ͧã��ǧ
		if($this->af->get('accept')){
			//friend�ơ��֥��status��2��ͧã�˹���
			$friend->set('friend_status', 2);
			$friend->update();
			
			//���Τޤޤ����ȡ������̹Ԥ�ͧã�ط��ʤΤǡ�����꤫�鼫ʬ�פ����Ǥʤ����ּ�ʬ�������פ���Ͽ����
			//��ʬ������id�ǡ����������Ͽ�����뤫��
			$user = $this->session->get('user');
			$sql = 	'select friend_id from friend where from_user_id = ' . $user['user_id'] .
					' and to_user_id = ' . $friend->get('from_user_id') . ' and friend_status = 1 ';
			$db = $this->backend->getDB();
			$rows = $db->db->getAll($sql ,$sqlValues, DB_FETCHMODE_ASSOC);
			$friend_id = false;
			$friend_id = $rows[0]['friend_id'];
			//����й�������
			if($friend_id){
				$o =& new Tv_Friend($this->backend,'friend_id',$friend_id);
				$o->set('friend_status', 2);
				$o->update();
			}
			//�ʤ������Ͽ����
			else{
				$friend_rev =& new Tv_Friend($this->backend);
				$friend_rev->set('from_user_id', $user['user_id']);
				$friend_rev->set('to_user_id', $friend->get('from_user_id'));
				$friend_rev->set('friend_status', 2);
				$friend_rev->add();
			}
			
			$this->af->set('to_user_id', $friend->get('from_user_id'));
			$this->af->set('message_title', '�ɲåꥯ�����Ȥ��꤬�Ȥ��������ޤ�');
			//ͧã��󥯽��� end
			
			
			//ͧã���Խ��� start
			//������invite�ơ��֥�򹹿����롣�ʤ����ǹ������ʤ��ȱʱ�˾�����������ä��ʤ��ΤǾ���������򹹿�����
			$user_id = $user['user_id'];
			$from_user_id = $friend->get('from_user_id');
			//invite�˾��󤬤��뤫��
			$o =& new Tv_Invite($this->backend);
			$list = $o->searchProp(array('invite_id'), array('from_user_id' => $from_user_id, 'to_user_id' => $user_id, 'invite_status' => 1,));
			//����ʤ鹹��
			if($list[0] > 0){
				$o =& new Tv_Invite($this->backend,'invite_id',$list[1][0]['invite_id']);
				$o->set('invite_status', 2);
				$o->update();
			}
			//ͧã���Խ��� end
			
			return 'user_message_send';
		}
		// ͧã����
		else{
			$friend->set('friend_status', 3);
			$friend->update();
			
			//ͧã���Խ��� start
			//������invite�ơ��֥�򹹿����롣�ʤ����ǹ������ʤ��ȱʱ�˾�����������ä��ʤ��ΤǾ���������򹹿�����
			$user_id = $user['user_id'];
			$from_user_id = $friend->get('from_user_id');
			//invite�˾��󤬤��뤫��
			$o =& new Tv_Invite($this->backend);
			$list = $o->searchProp(array('invite_id'), array('from_user_id' => $from_user_id, 'to_user_id' => $user_id, 'invite_status' => 1,));
			
			//����ʤ鹹��
			if($list[0] > 0){
				$o =& new Tv_Invite($this->backend, 'invite_id', $list[1][0]['invite_id']);
				$o->set('invite_status', 2);
				$o->update();
			}
			//ͧã���Խ��� end
			
			return 'user_friend_accept';
		}
	}
}
?>