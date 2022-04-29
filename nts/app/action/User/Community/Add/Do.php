<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティ登録実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_title' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXT,
			'type'	 		=> VAR_TYPE_STRING,
			'string_max_emoji'	=> 100,
		),
		'community_description' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXTAREA,
			'string_max_emoji'	=> 1000,
		),
		'community_category_id' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_category',
		),
		'community_join_condition' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_join_condition',
		),
		'community_topic_permission' => array(
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util,community_topic_permission',
		),
		'confirm' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'add' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'			=> VAR_TYPE_STRING,
		),
		'back' => array(
			'form_type'		=> FORM_TYPE_SUBMIT,
			'type'	  		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザコミュニティ登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻る
		if($this->af->get('back')) return 'user_community_add';
		
		// 検証エラー 
		if($this->af->validate() > 0) return 'user_community_add';
		
		// 二重投稿
		if(Ethna_Util::isDuplicatePost()){
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_community_add';
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
		// コミュニティ追加
		$community =& new Tv_Community($this->backend);
		$community->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$community->add();
		
		// コミュニティメンバー追加
		$user = $this->session->get('user');
		$communityMember =& new Tv_CommunityMember($this->backend);
		$communityMember->set('community_id', $community->getId());
		$communityMember->set('user_id', $user['user_id']);
		$communityMember->set('community_member_status', 2);
		$communityMember->add();
		
		// コミュニティIDをセット
		$this->af->setApp('community_id', $community->getId());
		// コミュニティ識別子をセット
		$this->af->setApp('community_hash', $community->get('community_hash'));
		
		return 'user_community_add_done';
	}
}

?>
