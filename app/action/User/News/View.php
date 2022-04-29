<?php
/**
 * View.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * ユーザニュース閲覧アクションフォーム
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Form_UserNewsView extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'news_id' => array(
			'required'	=> true,
		),
		'return' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}
/**
 * ユーザニュース閲覧アクション
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserNewsView extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		return 'user_news_view';
	}
}
?>