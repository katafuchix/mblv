<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティコメント削除確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserCommunityCommentDeleteConfirm extends Tv_Form_UserCommunityCommentDeleteDo
{
}
/**
 * ユーザコミュニティコメント削除確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
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
		// オブジェクトを取得
		$o =& new Tv_CommunityComment($this->backend, 'community_comment_id', $this->af->get('community_comment_id') );
		// オブジェクトが無効な場合
		if(!$o->isValid() || $o->get('community_comment_status') != 1){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		// オブジェクトをセットする
		$this->af->setApp('comment', $o->getNameObject());
		return 'user_community_comment_delete_confirm';
	}
}
?>