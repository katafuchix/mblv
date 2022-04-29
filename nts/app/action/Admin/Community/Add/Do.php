<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理コミュニティ登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminCommunityAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'community_title' => array(
			'required'		=> true,
		),
		'community_category_id' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_category',
			'required'		=> true,
		),
		'community_join_condition' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_join_condition',
			'required'		=> true,
		),
		'community_topic_permission' => array(
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,community_topic_permission',
			'required'		=> true,
		),
		'community_description' => array(
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'required'		=> true,
		),
		'user_id' => array(
			'name'			=> W_ADMIN_COMMUNITY_ADMIN_USER_ID,
			'form_type'		=> FORM_TYPE_TEXT,
			'required'		=> true,
		),
	);
}

/**
 * 管理コミュニティコメント登録実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminCommunityAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_add';
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
		// オブジェクトを取得
		$o =& new Tv_Community($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$r = $o->add();
		
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_community_add';
		
		// 管理人を登録
		$cm =& new Tv_CommunityMember($this->backend);
		$cm->set('community_id', $o->getId());
		$cm->set('user_id', $this->af->get('user_id'));
		$cm->set('community_member_status', 2);
		$r = $cm->add();
		if(Ethna::isError($r)){
			$o->remove();
			return 'admin_community_add';
		}
		
		// メッセージ
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_ADD_DONE);
		
		return 'admin_community_add_done';
	}
}
?>