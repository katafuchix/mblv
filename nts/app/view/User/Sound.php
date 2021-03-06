<?php
/**
 * Sound.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザサウンドポータルページビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserSound extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// サウンドカテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'sound_category',
			'sql_where'		=> 'sound_category_status = 1 AND sound_category_priority_id > 0',
			'sql_order'		=> 'sound_category_priority_id DESC',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r);
		
		// サウンドランキング
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'sound s, sound_category sc, ranking r',
			'sql_where'		=> 'r.type = ? AND s.sound_id = r.id AND s.sound_status = 1 AND s.sound_category_id = sc.sound_category_id',
			'sql_values'	=> array('sound'),
			'sql_order'		=> 'r.ranking_order LIMIT 3'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// CMS
		$o =& new Tv_Cms($this->backend, 'cms_type', 5);
		$this->af->setAppNE('cms_html1', $um->convertHtml($o->get('cms_html1')));
		$this->af->setAppNE('cms_html2', $um->convertHtml($o->get('cms_html2')));
		$this->af->setAppNE('cms_html3', $um->convertHtml($o->get('cms_html3')));
		
		// ニュース一覧の取得
		// ステータスが有効な属性のみ表示する
		$sqlWhere = 'news_status = 1 AND news_type= ? ';
		// 配信開始日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_start_status = 0 OR (news_start_status = 1 AND news_start_time < now())) ";
		// 配信終了日時が有効なもののみ表示する
		$sqlWhere .= " AND (news_end_status = 0 OR (news_end_status = 1 AND news_end_time > now())) ";
		
		$sqlValues = array(NEWS_TYPE_TOP);		// NAPATOWN
		//$sqlValues = array(NEWS_TYPE_SOUND);
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
