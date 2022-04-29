<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ友達一覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFriendList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
		),
	);
}

/**
 * ユーザ友達一覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFriendList extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if($this->af->validate() > 0) return 'user_home';
		
		// 誰の友達一覧を取得するか？
		$user_session = $this->session->get('user');
		// user_idが指定されてない場合は自分の友達一覧を表示する
		$user_id = ($this->af->get('user_id') == '') ? $user_session['user_id'] : $this->af->get('user_id');
		$user =& new Tv_User($this->backend, 'user_id', $user_id);
		// $userが取得できない or 登録中ユーザではない 場合
		if($user->isValid() == false || $user->get('user_status') != 2){
			$this->ae->add(null, '', E_USER_NOT_FOUND);
			return 'user_error';
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
		return 'user_friend_list';
	}
}
?>