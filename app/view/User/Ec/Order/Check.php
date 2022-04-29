<?php
/**
 * Check.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 注文内容確認画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcOrderCheck extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// 準備
		$cart_hash = $this->session->get('cart_hash');
		$usersess = $this->session->get('user');
		$user_id = $usersess['user_id'];
		
		// ユーザ情報の取得
		$u = new Tv_User($this->backend, 'user_id', $user_id);
		$u->exportform();
		
		/*
		 * 買い物カゴの中身の取得
		 */
		$sqlWhere = "c.cart_hash = ? ".
				" AND c.stock_id = s.stock_id ".
				" AND s.item_id = i.item_id ".
				" AND c.cart_status = 0";
		
		$param = array(
			'sql_select'	=> '*',
			'sql_values'	=> array($cart_hash),
			'sql_from'		=> 'cart c,item i,stock s',
			'sql_where'		=> $sqlWhere
		);
		
		$cart_list = $um->dataQuery($param);
		$this->af->setApp("cart_list", $cart_list);
			
		// 買い物合計金額の初期化
		$user_order_total_price1 = 0;
		// 取得ポイントの初期化
		$user_order_get_point = 0;
		// 買い物カゴ合計商品個数の初期化
		$total_num = 0;
		// すべての買い物カゴレコードに対して処理する
		foreach($cart_list as $k => $v){
			// 買い物カゴレコードの小計を計算する
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// 消費税抜きの合計金額を加算する
			$user_order_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// 合計商品個数を加算する
			$total_num += $v['cart_item_num'];
			// ポイント計算
			$user_order_get_point += $v['item_point'] * $v['cart_item_num'];
			// 発送単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			//$unit_item_detail[$v['item_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			//$unit_item_detail[$v['item_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ストック（タイプ）ID単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
		}
		// 合計金額
		$this->af->setApp("user_order_total_price1",$user_order_total_price1);
		// 合計取得ポイント
		$this->af->setApp("user_order_get_point",$user_order_get_point);
		
		/*
		 * 消費税の計算
		 */
		$user_order_tax = floor($user_order_total_price1/21);
		$this->af->setApp("user_order_tax",$user_order_tax);
		
		/*
		 * 送料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 送料
		 */
		$user_order_postage = 0;
		// 購入ユーザの都道府県
		$pref = $u->get('region_id');
		// その他住所へ配送の場合は、配送先の都道府県に上書き
		if($this->af->get('user_order_delivery_type') == 2) $pref = $this->af->get('user_order_delivery_region_id');
		// 送料を取得
		if(!$cart_list) return 'user_error';
		$user_order_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail ,$pref);
		$this->af->setApp("user_order_postage",$user_order_postage);
		
		/*
		 * 代引き手数料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 代引き手数料
		 */
		$user_order_exchange_fee = 0;
		if($this->af->get('user_order_type')==3){
			if(!$cart_list) return 'user_error';
			$user_order_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$this->af->setApp("user_order_exchange_fee",$user_order_exchange_fee);
		
		/*
		 * ポイント計算
		 */
		$user_order_expend_point = 0;
		if($this->af->get('user_order_use_point_status') == 1){
			$user_order_expend_point = $this->af->get('user_order_use_point');
		}
		// 商品小計 < 使用するポイントの場合は調整
		if($user_order_total_price1 < $user_order_expend_point){
			$user_order_expend_point = $user_order_total_price1;
		}
		$this->af->setApp('user_order_expend_point', $user_order_expend_point);
		
		/*
		 * 合計金額
		 */
		$user_order_total_price2 = $user_order_total_price1 - $user_order_expend_point + $user_order_postage + $user_order_exchange_fee;
		$this->af->setApp("user_order_total_price2",$user_order_total_price2);
		
		// ポストされたデータをHIDDENフォームとして引き継ぐ
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>