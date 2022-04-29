<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコメント登録実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommentAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'	  => VAR_TYPE_STRING,
		),
		'comment_type' => array(
			'required'  => true,
		),
		'comment_subid' => array(
			'required'  => true,
		),
		'comment_body' => array(
			'required'  => true,
		),
		'confirm' => array(
		),
		'back' => array(
		),
		'add' => array(
			'name' => '送信',
		),
		'return' => array(
		),
	);
}

/**
 * ユーザコメント登録実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommentAddDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// ToDo:戻り先要検討
		// 戻るボタン、検証エラー
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			return 'user_error';
		}
		// 二重投稿エラー
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add(null, '', E_USER_DUPLICATE_POST);
			return 'user_error';
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
		// コメントオブジェクトを追加
		$comment =& new Tv_Comment($this->backend);
		$comment->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		if(!$this->af->get('user_id')){
			$user_session = $this->session->get('user');
			$comment->set('user_id', $user_session['user_id']);
		}
		
		$r = $comment->add();
		if(Ethna::isError($r)) return 'user_error';
		
		return 'user_comment_add_done';
	}
}
?>
