<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコメント削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommentDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'comment_id' => array(
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
 * ユーザコメント削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if( $this->af->validate() > 0 ) return 'user_home';
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
		// コメントオブジェクトの取得
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		
		// コメントが存在しない場合はエラーを出す
		if(!$comment->isValid() || $comment->get('comment_status') != 1){
			$this->ae->add(null, '', E_USER_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// 「いいえ」が押されたならば戻る
		if( $this->af->get('back') ) {
			// ToDo:戻り先要検討
			if($comment->get('comment_type') == 2){
				$this->af->set('game_id', $comment->get('comment_subid'));
				return 'user_comment_edit';
			}
			return 'user_home';
		}
		
		// コメントを論理削除
		$comment->set('comment_status', 0);
		$comment->set('comment_deleted_time', date('YmdHis'));
		$comment->update();
		
		$comment->exportForm();
		
		if($comment->get('comment_type') == 2){
			//$this->af->set('game_id', $comment->get('comment_subid'));
			//return 'user_game_buy';
			return 'user_comment_delete_done';
		}
		return 'user_comment_delete_done';
	}
}
?>