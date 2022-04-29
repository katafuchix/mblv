<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品一覧画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		//where句生成
		$sqlWhere = " 1 ";
		
		//キーワード検索
		if($this->af->get('keyword')){
			//カタカナ（半角/全角）のみの単語なら半角/全角両方で検索する
			$keyword = $this->af->get('keyword');
			$keyword_z = mb_convert_kana($keyword, "KV");//半角→全角
			$keyword_h = mb_convert_kana($keyword, "k");//全角→半角
			$sqlWhere .= " and(i.item_name LIKE ? or i.item_name like ? or i.item_name like ?) ";
			$sqlValues[] = "%" . $keyword . "%";
			$sqlValues[] = "%" . $keyword_z . "%";
			$sqlValues[] = "%" . $keyword_h . "%";
		}
		
		//ショップ検索
		if($this->af->get('shop') != ""){
			$sqlWhere .= " AND i.shop_id = ? ";
			$sqlValues[] = $this->af->get('shop');
		}
		
		//カテゴリテーブルとアイテムテーブルを指定
		if($this->af->get('item_category') != ""){
			$sqlWhere .= " AND (";
			
			$sqlWhere .= ' i.item_category_id = ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ?)';
			$sqlValues[] = $this->af->get('item_category');
			$sqlValues[] = '^' . $this->af->get('item_category') . ',';
			$sqlValues[] = ',' . $this->af->get('item_category') . '$';
			$sqlValues[] = ',' . $this->af->get('item_category') . ',';
		}
		
		//カテゴリテーブルとアイテムテーブルを指定
		if($this->af->get('category_id') != ""){
			$sqlWhere .= ' (i.item_category_id = ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ? OR i.item_category_id REGEXP ?)';
			$sqlValues[] = $this->af->get('item_category');
			$sqlValues[] = '^' . $this->af->get('item_category') . ',';
			$sqlValues[] = ',' . $this->af->get('item_category') . '$';
			$sqlValues[] = ',' . $this->af->get('item_category') . ',';
		}
		
		//予算min
		if($this->af->get('price_start') != ""){
			$sqlWhere .= " AND i.item_price >= ? ";
			$sqlValues[] = $this->af->get('price_start');
		}
		
		//予算max
		if($this->af->get('price_end') != ""){
			$sqlWhere .= " AND i.item_price <= ? ";
			$sqlValues[] = $this->af->get('price_end');
		}
		
		//支払方法検索
		if($this->af->get('item_order_type') != ""){
			if($this->af->get('item_order_type') == 1)$item_order_type_flag = 'item_use_credit_status';
			if($this->af->get('item_order_type') == 2)$item_order_type_flag = 'item_use_conveni_status';
			if($this->af->get('item_order_type') == 3)$item_order_type_flag = 'item_use_exchange_status';
			if($this->af->get('item_order_type') == 4)$item_order_type_flag = 'item_use_transfer_status';
			$sqlWhere .= " AND i.$item_order_type_flag = 1 ";
		}
		
		//並び順
		if($this->af->get('sort_order') != ""){
			if($this->af->get('sort_order') == 2)$sqlOrder = ' i.item_price asc ';	//価格が安い
			if($this->af->get('sort_order') == 3)$sqlOrder = ' i.item_price desc ';	//価格が高い
			
			//人気順の場合はrankingと結合する
			if($this->af->get('sort_order') == 1){
				//人気順で昇順
				$sqlOrder = ' r.ranking_order desc ';
				//結合
				$join = ' left join ranking r on i.item_id = r.id AND '.
						"  r.type = 'item '";
			}
		}else{
			$sqlOrder = ' i.item_id desc ';
		}
		
		//表示してよい商品のみ検索(item_status:0:削除,1:表示,2:非表示  
		$sqlWhere.= " AND i.item_status = '1' ";
		
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= ' AND (i.item_start_status = 0 OR (i.item_start_status = 1 AND i.item_start_time < now())) ';
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= ' AND (i.item_end_status = 0 OR (i.item_end_status = 1 AND i.item_end_time > now())) ';
		$sqlSelect = "i.item_id, i.item_name, i.item_price, i.item_image, i.item_text1, i.item_label_front, i.item_label_back ";
		if($join) $sqlSelect.= " , ifnull(r.ranking_order, 10000)as rank ";//人気順の場合は順位も取得
		
		$this->listview = array(
			'action_name'	=> 'user_ec_item_list',
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> 'item i ' . $join,
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> $sqlOrder,
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 5
		);
	}
}
?>