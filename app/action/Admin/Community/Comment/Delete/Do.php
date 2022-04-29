<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理コミュニティコメント削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminCommunityCommentDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'community_comment_id' => array(
			'required'  => true,
			'form_type' => FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * 管理コミュニティコメント削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminCommunityCommentDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_community_comment_search';
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
		/* コメント削除（※物理削除する */
		$comment =& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$this->af->get('community_comment_id')
		);
		$comment->delete();
		
		// フォーム値をクリアする
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_COMMUNITY_COMMENT_DELETE_DONE);
		return 'admin_community_comment_list';
	}
}
?>