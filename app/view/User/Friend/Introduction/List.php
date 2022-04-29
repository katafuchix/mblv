<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ͧã�Ҳ�ʸ�������̥ӥ塼
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserFriendIntroductionList extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$user_session = $this->session->get('user'); 
		// �桼���Υ˥å��͡�������
		$user = &new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('to_user_id')
		);
		$this->af->setApp('user', $user->getNameObject()); 
		
		$sqlWhere = "f.to_user_id=? AND f.friend_status=2 AND f.friend_introduction<>'' AND f.from_user_id=fu.user_id";
		$sqlValues = array($this->af->get('to_user_id'));
		$this->listview = array(
			'action_name'	=> 'user_friend_introduction_list',
			'sql_select' 	=> 'f.friend_introduction, fu.user_id, fu.user_nickname',
			'sql_from'		=> 'friend as f, user as fu',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> '',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5,
		);
	}
}
?>