<?php
/**
 * Tv_Friend.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �F�B�����N�}�l�[�W��
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_FriendManager extends Ethna_AppManager
{
	/**
	 * �F�B�\��
	 * @param
	 	[af]to_user_id
	 	[af]friend_message
	 	[session]user
	 */
	function applyFriend()
	{
		// �Z�b�V���������擾
		$user = $this->session->get('user');
		$from_user_id = $user['user_id'];
		$from_user_nickname = $user['user_nickname'];
		
		// �F�B�\������ǉ�
		$friend =& new Tv_Friend($this->backend);
		$friend->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$friend->set('from_user_id', $from_user_id);
		$friend->set('friend_status', 1);
		$friend->add();
		
		//���b�Z�[�W�����邱�Ƃ����[�U�[��E���[���ł��m�点 start
		$o =& new Tv_User($this->backend,'user_id', $this->af->get('to_user_id'));
		$to_user_hash = $o->get('user_hash');
		$to_user_nickname = $o->get('user_nickname');
		$to_user_mailaddress = $o->get('user_mailaddress');
		
		$ms = new Tv_Mail($this->backend);
		$value = array (
			'user_nickname' => $to_user_hash,
			'from_user_nickname' => $from_user_nickname,
			'to_user_nickname' => $to_user_nickname,
		);
		$ms->sendOne($to_user_mailaddress , 'user_friend_apply' , $value );
		//���b�Z�[�W�����邱�Ƃ����[�U�[��E���[���ł��m�点 end
		
		return true;
	}
	
	/**
	 * �w�肵�����[�U�̗F�B�ꗗ���\���ɂ��āA���肩�����\���ɂ���
	 * 
	 * @access     public
	 * @param int $user_id ���[�UID
	 */
	function statusOff($user_id)
	{
		$fr = &new Tv_Friend($this->backend);
		$filter_1 = &new Ethna_AppSearchObject($user_id, OBJECT_CONDITION_EQ);
		$filter_2 = &new Ethna_AppSearchObject($user_id, OBJECT_CONDITION_EQ);
		$filter_1->addObject('friend.to_user_id' , $filter_2, OBJECT_CONDITION_OR);
		$addfilter = array('from_user_id' => $filter_1,);
		$fr_list = $fr->searchProp(
			array('friend_id'),
			$addfilter
			); 
		// friend_status��"3:�F�B�ł͂Ȃ�"�ɂ���
		if ($fr_list[0] > 0) {
			foreach($fr_list[1] as $v) {
				$fr = &new Tv_Friend(
					$this->backend,
					'friend_id',
					$v['friend_id']
					);
				if (!$fr->isValid()) return false;
				$fr->set('friend_status', 3);
				$fr->update();
			} 
		} 
	}
} 

/**
 * �F�B�����N�I�u�W�F�N�g
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Friend extends Ethna_AppObject
{
} 
?>