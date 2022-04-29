<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティコメント登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_article_id' => array(
			'required'	=> true,
		),
		'community_comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
		),
	);
}

/**
 * ユーザコミュニティコメント登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 戻るボタン
		if($this->af->get('back')) return 'user_community_article_view';
		
		// 検証エラー
		if($this->af->validate() > 0) return 'user_community_article_view';
		
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
		// コミュニティコメント追加
		$comment =& new Tv_CommunityComment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// オーバーライド
		$comment->add();
		
		// コミュニティコメントIDをセット
		$this->af->set('community_comment_id', $comment->getId());
		
		// コミュニティ識別子をセット
		$this->af->setApp('community_comment_hash', $comment->get('community_comment_hash'));
		
		// コミュニティトピック更新
		$article =& new Tv_CommunityArticle($this->backend, 'community_article_id', $comment->get('community_article_id'));
		$article->set('community_article_comment_num', $article->get('community_article_comment_num') + 1);
		$timestamp = date('Y-m-d H:i:s');
		$article->set('community_article_comment_time', $timestamp);
		$article->update();
		
		return 'user_community_comment_add_done';
	}
}
?>