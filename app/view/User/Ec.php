<?php
/**
 * モールトップページの表示
 */
class Tv_View_UserEc extends Tv_ListViewClass
{
	/**
	 * 画面表示前処理
	 * 
	 * @access     public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// CMS
		$o = &new Tv_Config($this->backend, 'config_type', 'mall');
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('site_cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('site_cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('site_cms_html3')));
		
		// 入会経路測定
		if($this->af->get('code')){
			// メディア経由のアクセスか判断
			$mm = $this->backend->getManager('Media');
			$media_access_hash = $mm->addMediaAccess();
			// セッションが始まっていない場合は開始
			if(!$this->session->isStart()){
				$this->session->start(0);
			} 
			// メディア経由でのアクセスの場合はパラメータをセッションに格納して引き継ぐ
			$this->session->set('media_access_hash', $media_access_hash); 
		}
		
		// ショップ一覧の取得
		// ステータスが有効な属性のみ表示する
		$param = array(
			'sql_select'	=> 'shop_id, shop_name, shop_news, shop_image1',
			'sql_from'		=> 'shop',
			'sql_where'		=> 'shop_id in ( select distinct shop_id from item_category where item_category_status = 1 ) AND shop_status = 1',
			'sql_order'		=> 'shop_priority_id ASC'
		);
		
		$s = $um->dataQuery($param);
		$this->af->setAppNe('shop_list', $s); 
		
		// 有効なステータスの商品のみ取得する
		$sqlWhere = 'r.type = ? AND i.item_id = r.id AND i.item_status = 1';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
		// ランキング種別
		$sqlValues[] = 'item';
		
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'item i left join ranking r on i.item_id = r.id',
			'sql_where'		=> $sqlWhere,
			'sql_values'	=> $sqlValues,
			'sql_order'		=> 'r.ranking_order DESC LIMIT 3'
		);
		
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
	}
}
?>