<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達紹介文削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendIntroductionDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'from_user_id' => array(
			'required'	=> true,
		),
		'to_user_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザ友達紹介文削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendIntroductionDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		$userSession = $this->session->get('user');
		
		if($this->af->validate() > 0){
			return 'user_home';
		}
		if($this->af->get('back')){
			return 'user_friend_introduction_list';
		}
		if($this->af->get('to_user_id') != $userSession['user_id'] &&
			$this->af->get('from_user_id') != $userSession['user_id'])
		{
			$this->ae->add(null, '', E_USER_FRIEND_INTRODUCTION_DENIED);
			return 'user_friend_introduction_list';
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
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($this->af->get('from_user_id'), $this->af->get('to_user_id'))
		);
		$friend->set('friend_introduction', '');
		$friend->update();
		
		return 'user_friend_introduction_delete_done';
	}
}
?>