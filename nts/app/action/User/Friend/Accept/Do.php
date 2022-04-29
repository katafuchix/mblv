<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達リンク承認実行アクションフォーム
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
 * ユーザ友達リンク承認実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendAcceptDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_friend_accept';
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// 友達オブジェクト取得
		$friend =& new Tv_Friend($this->backend, 'friend_id', $this->af->get('friend_id'));
		// 友達承認
		if($this->af->get('accept')){
			//friendテーブルのstatusを2：友達に更新
			$friend->set('friend_status', 2);
			$friend->update();
			
			//このままおわると、一方通行の友達関係なので、「相手から自分」だけでなく、「自分から相手」も登録する
			//自分と相手のidで、申請中の登録があるか？
			$user = $this->session->get('user');
			$sql = 	'select friend_id from friend where from_user_id = ' . $user['user_id'] .
					' and to_user_id = ' . $friend->get('from_user_id') . ' and friend_status = 1 ';
			$db = $this->backend->getDB();
			$rows = $db->db->getAll($sql ,$sqlValues, DB_FETCHMODE_ASSOC);
			$friend_id = false;
			$friend_id = $rows[0]['friend_id'];
			//あれば更新する
			if($friend_id){
				$o =& new Tv_Friend($this->backend,'friend_id',$friend_id);
				$o->set('friend_status', 2);
				$o->update();
			}
			//なければ登録する
			else{
				$friend_rev =& new Tv_Friend($this->backend);
				$friend_rev->set('from_user_id', $user['user_id']);
				$friend_rev->set('to_user_id', $friend->get('from_user_id'));
				$friend_rev->set('friend_status', 2);
				$friend_rev->add();
			}
			
			$this->af->set('to_user_id', $friend->get('from_user_id'));
			$this->af->set('message_title', '追加リクエストありがとうございます');
			//友達リンク処理 end
			
			
			//友達招待処理 start
			//ここでinviteテーブルを更新する。（ここで更新しないと永遠に招待中一覧が消えないので招待中一覧を更新する
			$user_id = $user['user_id'];
			$from_user_id = $friend->get('from_user_id');
			//inviteに情報があるか？
			$o =& new Tv_Invite($this->backend);
			$list = $o->searchProp(array('invite_id'), array('from_user_id' => $from_user_id, 'to_user_id' => $user_id, 'invite_status' => 1,));
			//あるなら更新
			if($list[0] > 0){
				$o =& new Tv_Invite($this->backend,'invite_id',$list[1][0]['invite_id']);
				$o->set('invite_status', 2);
				$o->update();
			}
			//友達招待処理 end
			
			return 'user_message_send';
		}
		// 友達拒否
		else{
			$friend->set('friend_status', 3);
			$friend->update();
			
			//友達招待処理 start
			//ここでinviteテーブルを更新する。（ここで更新しないと永遠に招待中一覧が消えないので招待中一覧を更新する
			$user_id = $user['user_id'];
			$from_user_id = $friend->get('from_user_id');
			//inviteに情報があるか？
			$o =& new Tv_Invite($this->backend);
			$list = $o->searchProp(array('invite_id'), array('from_user_id' => $from_user_id, 'to_user_id' => $user_id, 'invite_status' => 1,));
			
			//あるなら更新
			if($list[0] > 0){
				$o =& new Tv_Invite($this->backend, 'invite_id', $list[1][0]['invite_id']);
				$o->set('invite_status', 2);
				$o->update();
			}
			//友達招待処理 end
			
			return 'user_friend_accept';
		}
	}
}
?>