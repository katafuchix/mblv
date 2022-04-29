<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ友達紹介文編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserFriendIntroductionEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'to_user_id' => array(
			'required'	=> true,
		),
		'friend_introduction' => array(
			'required'  => true,
		),
		'confirm'	=> array(),
		'update'	=> array(),
		'back'	=> array(),
	);
}

/**
 * ユーザ友達紹介文編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserFriendIntroductionEditDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0 || $this->af->get('back')){
			return 'user_friend_introduction_edit';
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
		$friend->set('friend_introduction', $this->af->get('friend_introduction'));
		$friend->update();
		
		$this->af->set('user_id', $this->af->get('to_user_id'));
		return 'user_profile_view';
	}
}
?>