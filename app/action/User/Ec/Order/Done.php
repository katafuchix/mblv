<?php
/**
 * Done.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 注文実行後処理アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderDone extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $form = array(
		'cart_id' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * 注文実行後処理アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderDone extends Tv_ActionUserOnly
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
		return 'user_ec_order_done';
	}
}
?>