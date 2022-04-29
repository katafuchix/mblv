<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバター設定確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserAvatarConfigConfirm extends Tv_Form_UserAvatarConfigDo
{
}

/**
 * ユーザアバター設定確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
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