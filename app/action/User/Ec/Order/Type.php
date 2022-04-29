<?php

/**
 * Type.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 支払情報選択アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UesrEcOrderType extends Tv_ActionForm
{
}

/**
 * 支払情報選択アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UesrEcOrderType extends Tv_ActionUserOnly
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
		// カートハッシュを元に買い物かご内の製品の在庫を確認する
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル)
		// 在庫テーブルは結合しない
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// 買い物かごの中に商品がない場合
		if(count($r) == 0){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		return 'user_ec_order_type';
	}
}
?>