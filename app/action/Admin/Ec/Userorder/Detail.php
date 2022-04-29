<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理オーダー詳細アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcUserorderDetail extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_order_id' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'cart_hash' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理オーダー詳細アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcUserorderDetail extends Tv_ActionAdminOnly
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
		$o = & new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		$o->exportForm();
		
		return 'admin_ec_userorder_detail';
	}
}
?>