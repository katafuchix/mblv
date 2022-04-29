<?php
/**
 * Game.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * ゲームポータル画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserGame extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$um = $this->backend->getManager('Util');
		
		// ゲームカテゴリ一覧を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game_category',
			'sql_where'	=> 'game_category_status = 1 AND game_category_priority_id >= 1',
			'sql_values'	=> array(),
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('category', $r); 
		
		// 新着ゲーム
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game',
			'sql_where'	=> 'game_status = 1',
			'sql_values'	=> array(),
			'sql_order'	=> 'game_updated_time DESC LIMIT 3'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('new', $r); 
		
		// ゲームランキング
		// まずはランキングを取得する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game g, ranking r',
			'sql_where'	=> "r.type = 'game' AND g.game_id = r.id AND game_status = 1",
			'sql_values'	=> array(),
			'sql_order'	=> 'r.ranking_order asc LIMIT 3'
		);
		
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		
		// 既定の件数に満たない場合
		$_count = 3 -count($r);
		if($_count>0){
			$rank_array = array();
			foreach($r as $k => $v){
				$rank_array[] = $v['game_id'];
			}
			if(count($rank_array)>0) $sqlWhere = "game_id not in (" . implode(",",$rank_array) .") AND ";
			$param = array(
				'sql_select'	=> 'distinct *',
				'sql_from'	=> 'game ',
				'sql_where'	=> $sqlWhere ." game_status = 1",
				'sql_values'	=> array(),
				'sql_order'	=> 'game_id asc LIMIT '. $_count
			);
			$q = $um->dataQuery($param);
			$this->af->setApp('ranking', array_merge($r,$q));
		}else{
			$this->af->setApp('ranking', $r); 
		}
		
		//print_r($r);
		// CMS
		$o = &new Tv_Cms($this->backend, 'cms_type', 4);
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
		//$sqlValues = array(NEWS_TYPE_GAME);
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
