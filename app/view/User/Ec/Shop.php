<?php
/**
 * Shop.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ショップ画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcShop extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// カテゴリリストの取得
		$sqlFrom = "item_category c join item i"
			. " on (c.item_category_id like i.item_category_id )"
			. " and i.shop_id = ? "
			. " and i.item_status = 1"
			. " and (i.item_start_status = 1"
			. " and i.item_start_time <= ?"
			. " and i.item_end_time >= ?)"
			. " or i.item_start_status = 2";
		
		$sqlValues[] = $this->af->get('shop_id');
		$sqlValues[] = date('Y-m-d H:i:s');
		$sqlValues[] = date('Y-m-d H:i:s');
		
		$sqlWhere.= "c.item_category_status = 1 and c.shop_id = ?";
		
		$sqlValues[] = $this->af->get('shop_id');
		
		$param = array(
			'sql_select'	=> 'distinct c.item_category_id, c.item_category_name, c.item_category_text, c.item_category_image1',
			'sql_from'		=> $sqlFrom,
			'sql_values'	=> $sqlValues,
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 'c.item_category_priority_id ASC'
		);
		$c = $um->dataQuery($param);
		$this->af->setApp('item_category_list', $c);
		
		// ショップ情報の取得
		$shopObject =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		$this->af->setApp('shop_category_print_status', $shopObject->get('shop_category_print_status'));
		$shopObject->exportForm();
		
		// フリースペースコンテンツを生成
		$this->af->setAppNe('shop_body', $um->convertHtml($shopObject->get('shop_body')));
		
		if($shopObject->get('shop_new_arrivals')) $newArrivalsId = split(",",$shopObject->get('shop_new_arrivals'));
		if(is_array($newArrivalsId)){
			$j = 0;
			$now = date('Y-m-d H:i:s');
			for($i=0;$i<count($newArrivalsId);$i++){
				$itemObject =& new Tv_Item($this->backend, 'item_id', $newArrivalsId[$i]);
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
					$j++;
				}
			}
			$this->af->setAppNE('shop_new_arrivals_list',$newArrivals);
		}
		
		// 人気ランキング商品情報の取得
		if($shopObject->get('shop_ranking')) $rankingId = split(",",$shopObject->get('shop_ranking'));
		$h = 0;
		if(is_array($rankingId)){
			for($i=0;$i<count($rankingId);$i++){
				$itemObject =& new Tv_Item($this->backend,'item_id',$rankingId[$i]);
				if( (( $itemObject->get('item_start_status') == '1' && 
					  	$itemObject->get('item_start_time') <= date('Y-m-d H:i:s') && 
					  	$itemObject->get('item_end_time') >= date('Y-m-d H:i:s') )
					  	|| $itemObject->get('item_start_status') == '2')
					 && $itemObject->get('item_status') == '1' )
					{
						$rankings[$i]['item_id'] = $rankingId[$i];
						$rankings[$i]['item_name'] = $itemObject->get('item_name');
						$rankings[$i]['item_image'] = $itemObject->get('item_image');
						$rankings[$i]['item_text1'] = $itemObject->get('item_text1');
						if($h == 0){
							$rankings[$i]['ranking'] = "1st";
						}elseif($h == 1){
							$rankings[$i]['ranking'] = "2nd";
						}elseif($h == 2){
							$rankings[$i]['ranking'] = "3rd";
						}elseif($h == 3){
							$rankings[$i]['ranking'] = "4th";
						}elseif($h == 4){
							$rankings[$i]['ranking'] = "5th";
						}
						$h++;
					}
			}
			$this->af->setAppNE('shop_ranking_list',$rankings);
		}
	}
}
?>