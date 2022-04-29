<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター設定確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserAvatarConfigConfirm extends Tv_Form_UserAvatarConfigDo
{
}

/**
 * ユーザアバター設定確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarConfigConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate()>0) return 'user_avatar_config_second';
		return null;
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function perform()
	{
		// セッション情報取得
		$sess = $this->session->get('user');
		
		// ユーザ情報を取得
		$u = new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定履歴があるかどうか確認
		if($u->get('avatar_config_first') == 1){
			$this->ae->add('errors', "既にｱﾊﾞﾀｰ初期設定が完了しています。");
			return 'user_error';
		}
		
		// プレビューに表示させるアバター用のセッションを書き変える
		$cart_avatar = array(
			array('avatar_id' => $this->af->get('first_avatar_id'), 'avatar_wear' => 1),
			array('avatar_id' => $this->af->get('second_avatar_id'), 'avatar_wear' => 1),
		);
		$this->session->set('cart_avatar', $cart_avatar);
		
		return 'user_avatar_config_confirm';
	}
}

?>
