<?php
/**
 * Type.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 支払方法選択画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcOrderType extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ユーザ情報の取得
		$userSess = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $userSess['user_id']);
		$this->af->setApp('user', $u->getNameObject());
		
		// 買い物かごの中身を取得（未決済ステータスのもののみ、在庫テーブル情報までは取得しない）
		$cart = $this->backend->getManager('Cart');
		$cart_list = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// 買い物かごの中身商品合計金額税込の取得->セット
		$this->af->setApp('total_price', $cart->getTotalPriceTaxin($cart_list));
		// 買い物かごの中身商品合計金額税込の取得->セット
		$this->af->setApp('total_price_taxout', $cart->getTotalPriceTaxout($cart_list));
		
		// 使用可能な支払い方法が決定していない場合
		if(!is_array($this->af->get('order_type_list'))){
			//支払い方法をセット
			$this->af->setApp('order_type_list',$cart->getOrderTypeList($cart_list));
		}
	}
}
?>