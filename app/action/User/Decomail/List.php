<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザデコメール一覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserDecomailList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'decomail_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'keyword' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
	);
}

/**
 * ユーザデコメール一覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserDecomailList extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_decomail';
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
		return 'user_decomail_list';
	}
}
?>