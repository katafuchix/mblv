<?php
/**
 * Confirm.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコミュニティコメント削除確認アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityCommentDeleteConfirm extends Tv_Form_UserCommunityCommentDeleteDo
{
}
/**
 * ユーザコミュニティコメント削除確認アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommunityCommentDeleteConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		$comment =& new Tv_CommunityComment( &$this->backend, 'community_comment_id', $this->af->get('community_comment_id') );
		
		if( !$comment->isValid() || $comment->get('community_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		$this->af->setApp( 'comment', $comment->getNameObject() );

		
		return 'user_community_comment_delete_confirm';
	}
}

?>
