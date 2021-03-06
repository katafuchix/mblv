<?php
/**
 * Decomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * デコメールポータル画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserDecomail extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
/*
		// デコメールカテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'decomail_category',
			'sql_where'		=> 'decomail_category_status = 1 AND decomail_category_priority_id >= 1',
			'sql_order'		=> 'decomail_category_priority_id',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
*/
		
/*
		// テンプレランキング
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' ranking r, decomail d ',
			'sql_where'		=> "r.ranking_type = 'decomail' 
								AND r.ranking_sub_id = d.decomail_id 
								AND d.decomail_status = 1 
								AND r.ranking_category_id = ?",
			'sql_order'	=> 'r.ranking_order LIMIT 3',
			'sql_values'	=> array(1),
		);
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'decomail',
			'sql_where'	=> 'decomail_status = 1 AND decomail_category_id = 1',
			'sql_values'	=> array(),
			'sql_order'	=> 'decomail_updated_time DESC LIMIT 3'
		);
		
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking1', $r); 
*/		
/*
		// 絵文字ランキング
		/*
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> ' ranking r, decomail d ',
			'sql_where'	=> "r.ranking_type = 'decomail' 
								AND r.ranking_sub_id = d.decomail_id 
								AND d.decomail_status = 1 
								AND r.ranking_category_id= ?",
			'sql_order'	=> 'r.ranking_order LIMIT 3',
			'sql_values'	=> array(2),
		);
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'decomail',
			'sql_where'	=> 'decomail_status = 1 AND decomail_category_id = 2',
			'sql_values'	=> array(),
			'sql_order'	=> 'decomail_updated_time DESC LIMIT 3'
		);
		
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking2', $r); 
*/
		
		// CMS
		$o = &new Tv_Cms($this->backend, 'cms_type', 3);
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('cms_html3')));
		
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_DECOMAIL);
		// リストビュー
		$this->listview = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'news',
			'sql_where'		=> $sqlWhere,
//			'sql_order'		=> 'news_id DESC',
			'sql_order'		=> 'news_start_time DESC',
			'sql_num'		=> 3,
			'sql_values'	=> $sqlValues,
		);
	}
}

?>
