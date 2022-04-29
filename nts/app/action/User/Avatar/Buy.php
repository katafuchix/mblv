<?php
/**
 * Buy.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター購入アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarBuy extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザアバター購入アクションクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarBuy extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar';
		
		// セッション情報取得
		$sess = $this->session->get('user');
		
		// ユーザー情報取得
		$u =& new Tv_User($this->backend, 'user_id', $sess['user_id']);
		// アバター初期設定が完了していない場合は初期設定画面を表示する
		if(!$u->get('avatar_config_first')){
			return 'user_avatar_config_first';
		}
		
		// アバター情報取得
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		if(!$a->isValid()){
			$this->ae->add(null, '', E_USER_AVATAR_INVALID);
			return 'user_error';
		}
		
		// アバターカテゴリ情報取得
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $a->get('avatar_category_id'));
		if(!$ac->isValid()){
			$this->ae->add(null, '', E_USER_AVATAR_INVALID);
			return 'user_error';
		}
		// アクセス制限
		// アバターカテゴリ優先度が「1」以下の場合
		if($ac->get('avatar_category_priority_id') < 1){
			// 一般会員はアクセスできない
			if($sess['user_guest_status'] == 0){
				$this->ae->add(null, '', E_USER_AVATAR_INVALID);
				return 'user_error';
			}
			// アバターカテゴリ優先度が「-2」の場合、ゲストスタッフ会員以外はアクセスできない
			if($ac->get('avatar_category_priority_id') == -2 && $sess['user_guest_status'] != 2){
				$this->ae->add(null, '', E_USER_AVATAR_INVALID);
				return 'user_error';
			}
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
		return 'user_avatar_buy';
	}
}

?>
