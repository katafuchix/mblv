<?php
/**
 * Game.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームスコア一覧（ゲーム別）画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserGameScoreListGame extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
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
		
		// ゲーム情報を取得
		$game =& new Tv_Game(
			$this->backend,
			'game_id',
			$this->af->get('game_id')
		);
		$this->af->setApp('game', $game->getNameObject());
		
		$sqlWhere = 'game_id=? AND s1.user_id=u.user_id AND s1.user_status = ? AND s1.user_game_score_status = ? ';
		$sqlValues = array($this->af->get('game_id'),2,1);
		$sqlWhere2 = 's2.game_id=s1.game_id AND s2.user_game_score_score>s1.user_game_score_score';
		// 累計でない場合は今月分を集計
		if($this->af->get('term') != 'all'){
			$year = date('Y');
			$month = date('m');
			$day = $um->getDayCount($year, intval($month));
			
			$sqlWhere .= ' AND s1.user_game_score_created_time >= ? AND s1.user_game_score_created_time <= ?';
			$sqlValues[] = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, 1);
			$sqlValues[] = sprintf("%04d-%02d-%02d 23:59:59", $year, $month, $day);
			
			$sqlWhere2 .= " AND s2.user_game_score_created_time >= '" . sprintf("%04d-%02d-%02d 00:00:00", $year, $month, 1) . "' AND s2.user_game_score_created_time <= '" . sprintf("%04d-%02d-%02d 23:59:59", $year, $month, $day) . "' AND s2.user_game_score_status = 1";
		}
		// リストビュー
		$this->listview = array(
			'action_name'		=> 'user_game_score_list',
			'sql_select'		=> "u.user_nickname, u.user_id, s1.user_game_score_score, s1.user_game_score_created_time, (SELECT count(s2.user_game_score_id) FROM user_game_score as s2 WHERE {$sqlWhere2})+1 as rank",
			'sql_from'		=> 'user as u, user_game_score as s1',
			'sql_where'		=> $sqlWhere,
//			'sql_group'		=> 's1.user_id',
			'sql_order'		=> 's1.user_game_score_score DESC',
			'sql_values'		=> $sqlValues,
			'sql_num'		=> 10,
		);
	}
}
?>