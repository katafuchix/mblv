<?php
/**
 * Game.php
 * 
 * @author Technovarth
 * @package SNSV
 */
/**
 * ゲームランキング画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserGameRanking extends Tv_ListViewClass
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
		
		// ゲームランキング
		/*
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game g, ranking r',
			'sql_where'	=> "r.ranking_type = 'game' AND g.game_id = r.ranking_sub_id AND game_status = 1",
			'sql_values'	=> array(),
			'sql_order'	=> 'r.ranking_order LIMIT 3,7'
		);
		*/
		/*
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game',
			'sql_where'	=> 'game_status = 1 ',
			'sql_values'	=> array(),
			'sql_order'	=> 'game_updated_time DESC LIMIT 3,7'
		);
		$r = $um->dataQuery($param);
		$this->af->setApp('ranking', $r); 
		*/
			
		// ゲームランキング
		// まずはランキングを取得する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'	=> 'game g, ranking r',
			'sql_where'	=> "r.type = 'game' AND g.game_id = r.id AND game_status = 1",
			'sql_values'	=> array(),
			'sql_order'	=> 'r.ranking_order asc LIMIT 3,7'
		);
		
		$r = $um->dataQuery($param);
		
		// 既定の件数に満たない場合
		$_count = 7 -count($r);
		if($_count>0){
			// すでにランクインしているgame_id
			$param = array(
				'sql_select'	=> '*',
				'sql_from'	=> 'game g, ranking r',
				'sql_where'	=> "r.type = 'game' AND g.game_id = r.id AND game_status = 1",
				'sql_values'	=> array(),
				'sql_order'	=> 'r.ranking_order asc LIMIT 10'
			);
			
			$p = $um->dataQuery($param);
			$rank_array = array();
			foreach($p as $k => $v){
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
	}
}

?>
