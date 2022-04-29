<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理代引き手数料登録アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcExchangeAdd extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'exchange_type' => array(
//			'name' => '代引き手数料設定タイプ',
			'type'      => VAR_TYPE_INT,
			'required'  => true,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> array(
							'1' => '一律設定',
							'2' => '金額範囲毎に設定',
							'3' => '合計金額で設定',
							'4' => '合計個数で設定',
							),
		),
		'exchange_add' => array(
		),
	);
}

/**
 * 管理代引き手数料登録アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcExchangeAdd extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
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
		return 'admin_ec_exchange_add';
	}
}
?>