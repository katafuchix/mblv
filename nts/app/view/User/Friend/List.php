<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ͧã�������̥ӥ塼
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserFriendList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user'); 
		// user_id�����ꤵ��Ƥʤ����ϼ�ʬ��ͧã������ɽ������
		$user_id = ($this->af->get('user_id') == '') ?
		$user_session['user_id'] : $this->af->get('user_id'); 
		
		// �桼���Υ˥å��͡�������
		$user = &new Tv_User($this->backend,
			'user_id',
			$user_id
			);
		$this->af->setApp('user_nickname', $user->get('user_nickname')); 
		
		// ͧã���������
		$friend = &new Tv_Friend($this->backend);
		$friendList = &$friend->searchProp(
			array('friend_id', 'to_user_id'),
			array('from_user_id' => $user_id,
				'friend_status' => 2,
				)
			);
		foreach($friendList[1] as $key => $item){
			$toUser = &new Tv_User($this->backend,
				'user_id',
				$item['to_user_id']
				); 
			// ͧã�����Ǥ���񤷤Ƥ�����ϡ���������ä�
			if(!$toUser->isValid() || $toUser->get('user_status') != 2){
				unset($friendList[1][$key]);
			}else{
				$friendList[1][$key]['image_id'] = $toUser->getName('image_id');
				$friendList[1][$key]['to_user_nickname'] = $toUser->getName('user_nickname');
			}
		}
		// ͧ�Ͱ��������
		$this->af->setApp('friend_list', $friendList);
	}
}

?>
