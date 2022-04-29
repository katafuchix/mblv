<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザコメント編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommentEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'comment_id' => array(
			'required'	=> true,
		),
		'comment_body' => array(
			'required'	=> true,
		),
		'submit' => array(
		),
		'edit_confirm' => array(
		),
		'back' => array(
		),
		'update' => array(
		),
	);
}
/**
 * ユーザコメント編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommentEditDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if( $this->af->validate() > 0 ) {
			return 'user_comment_edit';
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
		// コメントオブジェクトの取得
		$comment =& new Tv_Comment(
			$this->backend,
			'comment_id',
			$this->af->get('comment_id')
		);
		
		// オブジェクトが無効であるかコメントが削除されているとき
		if(!$comment->isValid() || $comment->get('comment_status') != 1){
			$this->ae->add(null, '', E_USER_COMMENT_NOT_FOUND);
			return 'user_error';
		}
		
		// 「いいえ」を押したなら日記に戻る
		if( $this->af->get('back') ) {
			// ToDo: 戻り先要検討
			if($comment->get('comment_type') == 2){
				$this->af->set('game_id', $comment->get('comment_subid'));
				return 'user_comment_edit';
			}
			return 'user_home';
		}
		
		// 日記コメントの編集
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$comment->set('comment_updated_time', date('YmdHis'));
		$comment->update();
		if(Ethna::isError($r)) return 'user_error';
		
		$comment->exportForm();
		
		// ToDo:遷移先要検討
		if($comment->get('comment_type') == 2){
			//$this->af->set('game_id', $comment->get('comment_subid'));
			//return 'user_game_buy';
			return 'user_comment_edit_done';
		}
		return 'user_comment_edit_done';
	}
}
?>