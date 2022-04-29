<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達紹介文編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendIntroductionEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザ友達紹介文編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendIntroductionEdit extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'user_home';
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
		$userSession = $this->session->get('user');
		
		$friend =& new Tv_Friend(
			$this->backend,
			array('to_user_id', 'from_user_id'),
			array($this->af->get('to_user_id'), $userSession['user_id'])
		);
		if(!$friend->isValid() || $friend->get('friend_status') != 2){
			$this->af->set('user_id', $this->af->get('to_user_id'));
			$this->ae->add(null, '', E_USER_FRIEND_INTRODUCTION_DENIED);
			return 'user_profile_view';
		}
		$this->af->set('friend_introduction', $friend->get('friend_introduction'));
		
		return 'user_friend_introduction_edit';
	}
}

?>
