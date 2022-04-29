<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコミュニティコメント編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'community_comment_id' => array(
			'required'	=> true,
		),
		'community_comment_body' => array(
			'required'  => true,
		),
		'community_comment_hash' => array(
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'update' => array(
		),
		'back' => array(
		),
		'delete_image' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * ユーザコミュニティコメント編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityCommentEditDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0){
			return 'user_community_comment_edit';
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
		
		// 有効なコミュニティコメントでない場合はエラー
		if( !$comment->isValid() || $comment->get('community_comment_status') != 1 ) {
			$this->ae->add(null, '', E_USER_COMMUNITY_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// コミュニティトピックIDをセット
		$this->af->set('community_article_id', $comment->get('community_article_id'));
		
		// 戻るボタン
		if( $this->af->get('back') ) {
			return 'user_community_comment_edit';
		}
		
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 画像を削除
		if($this->af->get('delete_image')){
			$comment->deleteImage();
		}
		// オーバーライド
		$comment->update();
		
		return 'user_community_comment_edit_done';
	}
}
?>