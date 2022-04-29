<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティコメント編集アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommunityCommentEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_comment_id' => array(
			'required'	=> true,
		),
	);
}

/**
 * ユーザコミュニティコメント編集アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityCommentEdit extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)
			return 'user_home';
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
		$comment =& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$this->af->get('community_comment_id')
		);
		$comment->exportForm();
		
		return 'user_community_comment_edit';
	}
}

?>
