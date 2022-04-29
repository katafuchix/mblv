<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザコメント一覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserCommentList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'comment_type' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
		'comment_subid' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * ユーザコメント一覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserCommentList extends Tv_ActionUserOnly
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
		// ToDo:遷移先要検討
		if($this->af->validate() > 0) return 'user_home';
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
		return 'user_comment_list';
	}
}

?>
