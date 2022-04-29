<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理友達紹介文編集実行アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUserFriendIntroductionEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'friend_id' => array(
			'name'		=> '友達ID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'friend_introduction' => array(
			'name'		=> '紹介文',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * 管理友達紹介文編集実行アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUserFriendIntroductionEditDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_user_friend_introduction_edit';
		
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
			'friend_id',
			$this->af->get('friend_id')
		);
		if($friend->isValid()){
			$friend->set('friend_introduction', $this->af->get('friend_introduction'));
			$r = $friend->update();
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_DB);
				return 'admin_user_friend_introduction_edit';
			}
		}else{
			$this->ae->add(null, '', E_ADMIN_USER_FRIEND_INVALID);
			return 'admin_user_friend_introduction_list';
		}
		return 'admin_user_friend_introduction_list';
	}
}
?>