<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザニュース一覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserNewsList extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'news_type' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}
/**
 * ユーザニュース一覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserNewsList extends Tv_ActionUser
{
	function prepare()
	{
		if($this->af->validate() > 0)
			'user_error';
		return null;
	}
	function perform()
	{
		return 'user_news_list';
	}
}
?>
