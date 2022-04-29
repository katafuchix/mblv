<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品検索実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'keyword' => array(
			'type' 			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'shop' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> 'Util, shop',
		),
		'item_category' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'			=> 'Util, item_category',
		),
		'item_category_id' => array(
				'type' 		=> VAR_TYPE_INT,
				'form_type' => FORM_TYPE_HIDDEN,
		),
		'sort_order' 	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
				1 => '人気順',
				2 => '価格が安い',
				3 => '価格が高い'
			),
		),
		'price_start' => array(
			'type' 			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'price_end' => array(
			'type' 			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'item_order_type' 	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
				1 => 'ｸﾚｼﾞｯﾄ',
				2 => 'ｺﾝﾋﾞﾆ',
				3 => '代金引換',
				4 => '銀行振込'
			),
		),
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
 * 商品検索実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemList extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
/*
		if($this->af->get('price_start') > $this->af->get('price_end')){
			$this->ae->add(null, '', E_USER_ITEM_BUDGET);
		}
*/
		if($this->af->validate() > 0) return 'user_ec_item_list';
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
		return 'user_ec_item_list';
	}
}
?>