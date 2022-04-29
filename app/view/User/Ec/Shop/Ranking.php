<?php
/**
 * Ranking.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ショップ商品ランキング画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcShopRanking extends Tv_ViewClass //ページングがないのでumを使う
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ショップ情報の取得
		$shopObject =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		// ショップランキングのアイテムIDをカンマ区切りの配列にする
		if($shopObject->get('shop_ranking')) $rankingId = split(",",$shopObject->get('shop_ranking'));
		
		$rankings = array();
		if(is_array($rankingId)){
			foreach($rankingId as $k=>$v){
				// 有効なステータスの商品のみ取得する
				$sqlWhere .= 'item_id = ? AND item_status = 1';
				// 配信開始日時が有効なもののみ表示する
				$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
				// 配信終了日時が有効なもののみ表示する
				$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
				
				$param = array(
					'sql_select'	=> '*',
					'sql_from'		=> 'item',
					'sql_where'		=> $sqlWhere,
					'sql_values'	=> array($v),
				);
				$r = $um->dataQuery($param);
				// データがあれば追加する
				if(count($r)>0){
					$rankings[] = $r[0];
				}
			}
		}
		$this->af->setAppNE('shop_ranking_list',$rankings);
		
	}
}
?>