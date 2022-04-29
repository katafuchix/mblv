<?php
/**
 * Twiter.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザトゥイッター閲覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserTwitter extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'page' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'thema_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
	);
}
/**
 * ユーザトゥイッター閲覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserTwitter extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 非会員の場合は２ページ目以降は見せない
		$sess = $this->session->get('user');
		if($this->af->get('page') >= 2 && !$sess){
			header("Location: ".$this->config->get('redirect_url'));
			exit;
		}
		
		if($this->af->validate() > 0) return 'user_error';
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
		return 'user_twitter';
	}
}
?>
