<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティコメント削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_comment_id' => array(
			'required'	=> true,
		),
		'delete_confirm' => array(
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}

/**
 * ユーザコミュニティコメント削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0)return 'user_community_comment_delete_confirm';
		if($this->af->get('back'))
		{
			$comment =& new Tv_CommunityComment(
				$this->backend,
				'community_comment_id',
				$this->af->get('community_comment_id')
			);
			$this->af->set('community_article_id', $comment->get('community_article_id'));
			return 'user_community_article_view';
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
		// コミュニティコメントオブジェクトを取得する
		$comment =& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$this->af->get('community_comment_id')
		);
		
		// 論理削除
		$comment->delete();
		
		// コミュニティ記事IDをセット
		$this->af->set('community_article_id', $comment->get('community_article_id'));
		
		return 'user_community_comment_delete_done';
	}
}
?>