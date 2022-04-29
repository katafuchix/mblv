<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバター一覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAvatarList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
		'keyword' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'sort_key' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'sort_order' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザアバター一覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserAvatarList extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar';
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
		return 'user_avatar_list';
	}
}
?>