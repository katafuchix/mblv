<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品削除実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'cart_id' => array(
			'type' 		=> VAR_TYPE_INT,
			'required' 	=> true,
		),
		'stock_id' => array(
			'type'        => VAR_TYPE_INT,
			'required' 	=> true,
		),
	);
}

/**
 * 商品削除実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemDeleteDo extends Tv_ActionUser
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
		// 買い物かごの中に入っているレコードを取得する
		$o = & new Tv_Cart(
			$this->backend,
			array('cart_id','stock_id'),
			array($this->af->get('cart_id'),$this->af->get('stock_id'))
		);
		// 削除
		if($o->isValid()){
			$o->remove();
		}
		
		$this->ae->add(null, '', I_USER_CART_DELETE_DONE);
		
		return 'user_ec_cart';
	}
}
?>