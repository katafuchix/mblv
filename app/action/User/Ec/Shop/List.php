<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 店舗検索実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcShopList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'shop_name' => array(
			'type' 			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'search' => array(//商品検索
			'type' 		=> VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
		'start' => array(
			'type' 		=> VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
		),
	);
}

/**
 * 店舗検索実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcShopList extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ec_item_search';
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
		return 'user_ec_shop_list';
	}
}
?>