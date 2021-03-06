<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達削除実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
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
 * ユーザ友達削除実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
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
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		$user = $this->session->get('user');		// 自分のﾕｰｻﾞｰID
		$to_user_id = $this->af->get('to_user_id'); // 相手のﾕｰｻﾞｰID
		
		// friend_idを取得
		$friend =& new Tv_Friend( $this->backend );
		$friendList =& $friend->searchProp(
			array('friend_id'),
			array(
				'from_user_id'	=> $user['user_id'],
				'to_user_id'	=> $to_user_id,
			)
		);
		if( $friendList[0] > 0 ) {
			$friend_id = $friendList[1][0]['friend_id'];
		}
		
		// もう一つのfriend_idを取得
		$friendList =& $friend->searchProp(
			array('friend_id'),
			array(
				'from_user_id'	=> $to_user_id,
				'to_user_id'	=> $user['user_id'],
			)
		);
		if( $friendList[0] > 0 ) {
			$friend_rev_id = $friendList[1][0]['friend_id'];
		}
		
		// DBから削除
		$friend =& new Tv_Friend(
			$this->backend,
			'friend_id',
			$friend_id
		);
		if( $friend->isValid() ) {
			$friend->remove();
		}
		
		// もう片方もDBから削除
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
