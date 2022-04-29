<?php
/**
 * List.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ広告一覧アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAdList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'ad_category_id' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'keyword' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザ広告一覧アクションクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAdList extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ad';
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
		return 'user_ad_list';
	}
}

?>
