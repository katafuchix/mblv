<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理送料登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcPostageAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'postage_type' => array(
//			'name' => '送料設定タイプ',
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option' 		=> array(
								'1' => '全国一律設定',
								'2' => '地域毎に設定',
								'3' => '合計金額で設定',
								'4' => '合計個数で設定',
								),
		),
		'postage_add' => array(
		),
	);
}

/**
 * 管理送料登録アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcPostageAdd extends Tv_ActionAdminOnly
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
		return 'admin_ec_postage_add';
	}
}
?>