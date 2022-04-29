<?php
/**
 * Apply.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達申請アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendApply extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
		),
	);
}

/**
 * ユーザ友達申請アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendApply extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		$user = $this->session->get('user');
		
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($user['user_id'], $this->af->get('to_user_id'))
		);
		
		if($friend->isValid()){
			switch($friend->get('friend_status')){
				case 1:
					$this->ae->add(null, '', E_USER_FRIEND_APPLY_DUPLICATE);
					return 'user_error';
				case 2:
					$this->ae->add(null, '', E_USER_FRIEND_DUPLICATE);
					return 'user_error';
				case 3:
					$friend->remove();	// 旧ﾃﾞｰﾀを消去
					break;
			}
		}
		return 'user_friend_apply';
	}
}
?>