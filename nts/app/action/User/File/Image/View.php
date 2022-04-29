<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ画像表示アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileImageView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'image_id' => array(
			'type'  => VAR_TYPE_INT,
			'required'  => true,
		),
		// 戻り先
		'community_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'community_article_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'blog_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'blog_article_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'message_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'message_type' => array(
			'type'  => VAR_TYPE_STRING,
		),
		//伝言メッセージ用
		'bbs_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		//伝言メッセージ用プロフィールに戻る用
		'to_user_id' => array(
			'type'  => VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザ画像表示アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileImageView extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) 'user_error';
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
		return 'user_file_image_view';
	}
}

?>
