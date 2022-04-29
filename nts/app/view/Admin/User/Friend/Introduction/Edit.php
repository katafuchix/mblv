<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ユーザ友達紹介文編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminUserFriendIntroductionEdit extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$friend =& new Tv_Friend(
			$this->backend,
			'friend_id',
			$this->af->get('friend_id')
		);
		if($friend->isValid()){
			$from_user =& new Tv_User(
				$this->backend,
				'user_id',
				$friend->get('from_user_id')
			);
			$this->af->setApp('from_user_id', $from_user->get('user_id'));
			$this->af->setApp('from_user_nickname', $from_user->get('user_nickname'));
			
			$to_user =& new Tv_User(
				$this->backend,
				'user_id',
				$friend->get('to_user_id')
			);
			$this->af->setApp('to_user_id', $to_user->get('user_id'));
			$this->af->setApp('to_user_nickname', $to_user->get('user_nickname'));
		}else{
			$this->ae->add(null, '', E_ADMIN_USER_FRIEND_INVALID);
		}
	}
}
?>