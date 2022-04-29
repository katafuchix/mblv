<?php
/**
 * Detail.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 商品詳細画面ビュークラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcItemDetail extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		$this->af->setApp('item_id', $this->af->get('item_id'));
		
		// アイテム情報の取得
		$itemObject =& new Tv_Item($this->backend,'item_id',$this->af->get('item_id'));
		$itemObject->exportform();
		$this->af->setAppNE('item_text2',$itemObject->get('item_text2'));
		$this->af->setAppNE('item_detail',$itemObject->get('item_detail'));
		$this->af->setAppNE('item_spec',$itemObject->get('item_spec'));
		$this->af->setApp('html_title',$itemObject->get('item_name'));
		$this->af->setApp('item_name',$itemObject->get('item_name'));
		$this->af->setApp('type',$this->af->get('type'));
		
		// アイテムタイプ情報を取得
		$param = array(
			'sql_select'	=> 'stock_id, item_type, stock_num, stock_one_type_status',
			'sql_from'		=> 'stock',
			'sql_where'		=> 'stock_status = 1 and item_id = ?',
			'sql_values'	=> array($this->af->get('item_id')),
			'sql_order'		=> 'stock_priority_id ASC'
		);
		$stockList = $um->dataQuery($param);

		if(count($stockList) == 0) {
			$zaiko_error = true;
		} else {
			// アイテムタイプオプション
			foreach($stockList as $k => $v){
				$stock_id = $v['stock_id'];
				if($v['stock_num']>0){
					$item_type_list[$stock_id]['name'] = $v['item_type'];
					if($v['stock_one_type_status']){
						$this->af->setApp("stock_one_type_status",$v['stock_one_type_status']);
						$this->af->setApp("one_type_only_id",$v['stock_id']);
					}
				}else{
					$zaiko_error = true;
				}
			}
		}
		
		if($zaiko_error) $this->af->setApp("zaikoerror","完売商品に関しては選択できないようになっております。");
		$this->af->setApp("item_type_list",$item_type_list);
		
		// 個数オプション
		for($i=1;$i<=9;$i++){
			$item_num_list[$i]['name'] = $i;
		}
		$this->af->setApp("item_num_list",$item_num_list);
		
		// サンプル画像情報の取得
		$param = array(
			'sql_select'	=> 'sample_id, sample_name, sample_image',
			'sql_from'		=> 'sample',
			'sql_where'		=> 'sample_status = 1 and item_id = ?',
			'sql_values'	=> array($this->af->get('item_id')),
			'sql_order'		=> 'sample_priority_id ASC'
		);
		$sampleList = $um->dataQuery($param);
		$this->af->setApp('sample_list', $sampleList);
		
		// レビューチェック
		$db = $this->backend->getDB();
		$sqlValues = array();
		$sqlValues[] = $this->af->get('item_id');
		$param = array(
			'sql_select'	=> 'a.review_id',
			'sql_from'		=> 'user as u, review as a, item as i',
			'sql_where'		=> 'u.user_id = a.user_id and a.item_id = i.item_id and a.review_status = 3 and a.item_id = ?',
			'sql_values'	=> $sqlValues
		);
		$reviewList = $um->dataQuery($param);
		$this->af->setApp('review_count', count($reviewList));
		
		// SHOP_ID情報取得
		$param = array(
			'sql_select'	=> 'shop_id',
			'sql_from'		=> 'item',
			'sql_where'		=> 'item_id = ?',
			'sql_values'	=> array($this->af->get('item_id'))
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('shop_id', $r[0]['shop_id']);
		
		//「友達へ教える」メールの購入はこちらからのリンク
		$this->af->setApp('user_url', $this->config->get('user_url'));
		
		$this->af->setApp('review_count',$review_count);
		
	}
}
?>