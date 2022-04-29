<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ͧã�������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendList extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
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
		$param = array(
			'sql_select'	=> ' friend_id, to_user_id',
			'sql_from'		=> ' friend ',
			'sql_where'		=> ' from_user_id = ? AND friend_status = ? ',
			'sql_values'	=> array( $user_id, 2 ),
		);
		$friendList = $um->dataQuery($param);
		
		foreach($friendList as $key => $item){
			$toUser = &new Tv_User($this->backend,
				'user_id',
				$item['to_user_id']
				); 
			// ͧã�����Ǥ���񤷤Ƥ�����ϡ���������ä�
			if(!$toUser->isValid() || $toUser->get('user_status') != 2){
				unset($friendList[$key]);
			}else{
				$friendList[$key]['image_id'] = $toUser->getName('image_id');
				$friendList[$key]['to_user_nickname'] = $toUser->getName('user_nickname');
			}
		}
		// ͧ�Ͱ��������
		$this->af->setApp('friend_list', $friendList);
	}
}
?>