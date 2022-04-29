<?php
/**
 * Avatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバターポータルアクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
 class Tv_Form_UserAvatar extends Tv_ActionForm
{
}

/**
 * ユーザアバターポータルアクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatar extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		// 性別が選択されていない場合はエラーにまわす
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		if(!$u->get('user_sex')){
			$this->ae->add(null, '', E_USER_AVATAR_SEX);
			return 'user_error';
		}
		
		// アバター初期設定が完了していない場合は初期設定画面を表示する
		if(!$u->get('avatar_config_first')){
			return 'user_avatar_config_first';
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
		return 'user_avatar';
	}
}
?>