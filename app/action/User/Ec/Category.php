<?php
/**
 * Category.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * カテゴリ一覧アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcCategory extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'item_category_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'page' => array(
			'type'        => VAR_TYPE_INT,
		),
		'start' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}
/**
 * カテゴリ一覧アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcCategory extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		return 'user_ec_category';
	}
}
?>