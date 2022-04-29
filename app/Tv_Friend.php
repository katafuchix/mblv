<?php
/**
 * Tv_Friend.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 友達リンクマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_FriendManager extends Ethna_AppManager
{
	/**
	 * 友達申請
	 * @param
	 	[af]to_user_id
	 	[af]friend_message
	 	[session]user
	 */
	function applyFriend()
	{
		// セッション情報を取得
		$user = $this->session->get('user');
		$from_user_id = $user['user_id'];
		$from_user_nickname = $user['user_nickname'];
		
		// 友達申請情報を追加
		$friend =& new Tv_Friend($this->backend);
		$friend->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$friend->set('from_user_id', $from_user_id);
		$friend->set('friend_status', 1);
		$friend->add();
		
		//メッセージがあることをユーザーにEメールでお知らせ start
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
		//メッセージがあることをユーザーにEメールでお知らせ end
		
		return true;
	}
	
	/**
	 * 指定したユーザの友達一覧を非表示にして、相手からも非表示にする
	 * 
	 * @access     public
	 * @param int $user_id ユーザID
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
		// friend_statusを"3:友達ではない"にする
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
 * 友達リンクオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Friend extends Ethna_AppObject
{
} 
?>