<?php
/**
 * Tv_Cart.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * カートマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CartManager extends Ethna_AppManager
{
	/**
	 * 買い物カゴの中身を返す
	 * 
	 * @param  $cart_hash（カートハッシュ）,$cart_status（カートステータス）,$stock（在庫テーブルまで取得対象とするかどうか）
	 * @access public
	 * @return array $cart_list（買い物かごの中身配列）
	 */
	function getCartList($cart_hash, $cart_status='0,1,2', $stock=true)
	{
		// 指定の[cart_staus]に応じて買い物かごステータス句を決定する
		$c = explode(',', $cart_status);
		// 値の指定が1つの場合
		if(count($c) == 1){
			$cart_status_phrase = "= {$c[0]}";
		}
		// 値の指定が複数の場合
		else{
			$cart_status_phrase = "in ({$cart_status})";
		}
		
		// 検索条件（From）
		$sqlFrom = 'cart as c,item as i';
		if($stock) $sqlFrom .= ',stock as s';
		// 検索条件（Where）
		$sqlWhere = "c.cart_hash = ? AND c.cart_status {$cart_status_phrase} AND c.item_id = i.item_id";
		if($stock) $sqlWhere .=  ' AND c.stock_id = s.stock_id';
		// 検索条件（Values）
		$sqlValues = array($cart_hash);
		
		// 買い物かごの中身を取得する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> $sqlFrom,
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
		);
		$um = $this->backend->getManager('Util');
		$r =  $um->dataQuery($param);
		// クエリエラーの場合
		if(Ethna::isError($r)) return array();
		
		$cart_list = $r;
		// 買い物かごの中身がない場合
		if(count($rows) == 0) return $r;
		
		$cart_list = $rows;
		// すべての買い物かごの中身に対して処理を行う
		foreach($cart_list as $k => $v){
			$true_item_price = floor($v['item_price']/21)*20;
			$cart_list[$k]['item_point'] = floor($true_item_price * $v['item_num'] * $v['item_point_ratio'] / 100);
		}
		return $cart_list;
	}
	
	/**
	 * 買い物かごの中身の合計金額(税込)を返す
	 *
	 * @param  $cart（配列の場合は買い物かごの中身、スカラーの場合はカートハッシュ）
	 * @access public
	 * @return integer $total_price
	 */
	function getTotalPriceTaxin($cart)
	{
		// 配列の場合、買い物かごの中身配列
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// その他の場合は、カートハッシュ
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		// 買い物合計金額の計算
		$total_price = 0;
		foreach($cart_list as $k => $v){
			// 個別の商品金額×商品個数
			$total_price += $v['item_price'] * $v['cart_item_num'];
		}
		return $total_price;
	}
	
	/**
	 * 買い物かごの中身の合計金額(税抜)を返す
	 *
	 * @param  $cart（配列の場合は買い物かごの中身、スカラーの場合はカートハッシュ）
	 * @access public
	 * @return integer $total_price
	 */
	function getTotalPriceTaxout($cart)
	{
		// 配列の場合、買い物かごの中身配列
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// その他の場合は、カートハッシュ
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		// 買い物合計金額の計算
		$total_price = 0;
		foreach($cart_list as $k => $v){
			// 個別の税引き商品金額×商品個数
			$true_item_price = floor($v['item_price']/21)*20;
			$total_price += $true_item_price * $v['cart_item_num'];
		}
		return $total_price;
	}
	
	/**
	 * 支払い可能な注文方法一覧を取得する
	 *
	 * @param  $cart（配列の場合は買い物かごの中身、スカラーの場合はカートハッシュ）
	 * @access public
	 * @return array $order_type_list
	 */
	function getOrderTypeList($cart)
	{
		// 配列の場合、買い物かごの中身配列
		if(is_array($cart)){
			$cart_list = $cart;
		}
		// その他の場合は、カートハッシュ
		else{
			$cart_list = $this->getCartList($cart, 0, false);
		}
		
		// お支払い方法の選択
		$order_type_list = $this->config->get('user_order_type');
		
		// 選択肢なしを排除
		unset($order_type_list['']);
		
		// 使用できない支払方法を削除（指定の支払い方法が不可能な場合、その支払い方法は除外される）
		foreach($cart_list as $k => $v){
			// クレジットが不可能な場合
			if(!$v['item_use_credit_status'])  unset($order_type_list[1]);
			// コンビニが不可能な場合
			if(!$v['item_use_conveni_status']) unset($order_type_list[2]);
			// 代引きが不可能な場合
			if(!$v['item_use_exchange_status']) unset($order_type_list[3]);
			// 銀行振り込みが不可能な場合
			if(!$v['item_use_transfer_status']) unset($order_type_list[4]);
		}
		
		return $order_type_list;
	}
}

/**
 * カートオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cart extends Ethna_AppObject
{
}
?>