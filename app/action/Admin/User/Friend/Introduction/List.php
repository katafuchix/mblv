<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理友達紹介文一覧実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminUserFriendIntroductionList extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'from_user_id' => array(
			'name'		=> '送信ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'to_user_id' => array(
			'name'		=> '受信ユーザID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'from_user_nickname' => array(
			'name'		=> '送信ユーザニックネーム',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'to_user_nickname' => array(
			'name'		=> '受信ユーザニックネーム',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'friend_introduction' => array(
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'friend_checked' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_checked',
		),
		'friend_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,friend_status',
		),
		// 更新系処理
		'update' => array(),
		'page' => array(),
		'id' => array(
			'name'		=> 'ID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> array(FORM_TYPE_HIDDEN),
		),
		'check' => array(
			'name'		=> 'チェックID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
	);
}

/**
 * 管理友達紹介文一覧実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminUserFriendIntroductionList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_user_friend_introduction_list';
		
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
		
		// ステータス、監視ステータス更新処理
		if($this->af->get('update')) $this->updateFriendStatusAll('friend');
		
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'admin_user_friend_introduction_list';
	}
}
?>