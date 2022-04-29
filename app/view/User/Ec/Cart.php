<?php
/**
 * Cart.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 買い物かご画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcCart extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		//買い物かご中身の取得、セット
		$cart = $this->backend->getManager('Cart');
		$cart_list = $cart->getCartList($this->session->get('cart_hash'), 0);
		$this->af->setApp('cart_list', $cart_list);
		//結果がない場合
		if(count($cart_list)==0 || $cart_list == false){
			$this->ae->add(null, '', E_USER_CART_EMPTY);
		}
		//結果がある場合
		else{
			//税込の商品代金合計を取得、セット
			$this->af->setApp('total_price', $cart->getTotalPriceTaxin($cart_list));
		}
		
		//買い物籠ページにお勧め商品を表示する start
		//お勧めする商品は、一番最近買い物かごに登録された商品のショップがお勧めする商品
		$values = array($this->session->get('cart_hash'));
		$param = array(
			'sql_select'	=> 'c.item_id, s.shop_new_arrivals',
			'sql_from'		=> 'cart c join item i on c.item_id = i.item_id and i.item_status = 1 join shop s on i.shop_id = s.shop_id and s.shop_status = 1',
			'sql_where'		=> 'c.cart_hash = ?',
			'sql_values'	=> $values,
		);
		$c = $um->dataQuery($param);
		
		//ショップのおすすめ設定に有効な商品のＩＤがある場合
		if(count($rows) > 0) {
			$newArrivalsId = explode(',', $rows[0]['shop_new_arrivals']);
			// お勧め商品情報の取得
			if(is_array($newArrivalsId)){
				$j = 0;
				$now = date('Y-m-d H:i:s');
				for($i=0;$i<count($newArrivalsId);$i++){
					$itemObject =& new Tv_Item($this->backend,'item_id',$newArrivalsId[$i]);
					// 有効なもののみ表示する
					if(
						$itemObject->get('item_status') == 1
						&&
						// 配信開始日時が有効なもののみ表示する
						(
							$itemObject->get('item_start_status') == 0
							||
							$itemObject->get('item_start_status') == 1 && $itemObject->get('item_start_time') < $now
						)
						&&
						// 配信終了日時が有効なもののみ表示する
						(
							$itemObject->get('item_end_status') == 0
							||
							$itemObject->get('item_end_status') == 1 && $itemObject->get('item_start_time') > $now
						)
					){
						$newArrivals[$i]['item_id'] = $newArrivalsId[$i];
						$newArrivals[$i]['item_name'] = $itemObject->get('item_name');
						$newArrivals[$i]['item_image'] = $itemObject->get('item_image');
						$newArrivals[$i]['item_text1'] = $itemObject->get('item_text1');
						if($j == 0){
							$newArrivals[$i]['ranking'] = "1st";
						}elseif($j == 1){
							$newArrivals[$i]['ranking'] = "2nd";
						}elseif($j == 2){
							$newArrivals[$i]['ranking'] = "3rd";
						}elseif($j == 3){
							$newArrivals[$i]['ranking'] = "4th";
						}elseif($j == 4){
							$newArrivals[$i]['ranking'] = "5th";
						}
						if($j >= 4 ) break;//5件のみ取得
						$j++;
					}
				}
				$this->af->setAppNE('shop_recommend_list',$newArrivals);
			}
		}else{
			//ショップのおすすめ設定に有効な商品のＩＤがない場合
		}
		if(count($c) > 0) {
			$newArrivalsId = explode(',', $c[0]['shop_new_arrivals']);
			// お勧め商品情報の取得
			if(is_array($newArrivalsId)){
				$j = 0;
				for($i=0;$i<count($newArrivalsId);$i++){
					$itemObject =& new Tv_Item($this->backend,'item_id',$newArrivalsId[$i]);
					if( (( $itemObject->get('item_start_status') == '1' && 
						  	$itemObject->get('item_start_time') <= date('Y-m-d H:i:s') && 
						  	$itemObject->get('item_end_time') >= date('Y-m-d H:i:s') )
						  	|| $itemObject->get('item_start_status') == '2')
						  && $itemObject->get('item_status') == '1' )
						{
							$newArrivals[$i]['item_id'] = $newArrivalsId[$i];
							$newArrivals[$i]['item_name'] = $itemObject->get('item_name');
							$newArrivals[$i]['item_image'] = $itemObject->get('item_image');
							$newArrivals[$i]['item_text1'] = $itemObject->get('item_text1');
							if($j == 0){
								$newArrivals[$i]['ranking'] = "1st";
							}elseif($j == 1){
								$newArrivals[$i]['ranking'] = "2nd";
							}elseif($j == 2){
								$newArrivals[$i]['ranking'] = "3rd";
							}elseif($j == 3){
								$newArrivals[$i]['ranking'] = "4th";
							}elseif($j == 4){
								$newArrivals[$i]['ranking'] = "5th";
							}
							if($j >= 4 ) break;//5件のみ取得
							$j++;
						}
				}
				$this->af->setAppNE('shop_recommend_list',$newArrivals);
			}
		}else{
			//ショップのおすすめ設定に有効な商品のＩＤがない場合
		}
		
		//買い物籠ページにお勧め商品を表示する end
	}
}
?>