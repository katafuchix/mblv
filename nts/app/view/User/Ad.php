<?php
/**
 * Ad.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザ広告ポータルページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserAd extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// 広告カテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'ad_category',
			'sql_where'	=> 'ad_category_status = 1 AND ad_category_priority_id >= 1',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		// CMS
		$o =& new Tv_Cms($this->backend, 'cms_type', 1);
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('cms_html3')));
		
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		$sqlValues = array(NEWS_TYPE_AD);
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'news',
			'sql_where'	=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'	=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}
?>
