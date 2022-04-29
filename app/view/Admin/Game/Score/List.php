<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ゲームスコア一覧画面ビュー
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_AdminGameScoreList extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access     public
	 */
	function preforward()
	{
		// 検索条件の生成
		$condition = array(
			// ゲームID検索
			'game_id' => array(
				'type' => 'EQ',
				'column' => 's1.game_id',
			),
			// ゲームコード検索
			'game_code' => array(
				'type' => 'EQ',
				'column' => 'g.game_code',
			),
			// ゲーム名検索
			'game_name' => array(
				'type' => 'LIKE',
				'column' => 'g.game_name',
			),
			// ユーザID検索
			'user_id' => array(
				'type' => 'EQ',
				'column' => 's1.user_id',
			),
			// ユーザニックネーム検索
			'user_nickname' => array(
				'type' => 'LIKE',
				'column' => 'u.user_nickname',
			),
		);
		list($sqlWhere, $sqlValues) = $this->getCondition($condition);
		
		if($sqlWhere != ''){
			$sqlWhere .= ' AND ';
		}
		$sqlWhere .= 'g.game_id=s1.game_id AND s1.user_id=u.user_id';
		
		$sqlSelect = 'g.game_id, g.game_code, g.game_name, u.user_id, u.user_nickname, s1.user_game_score_score, (SELECT count(s2.user_game_score_id) FROM user_game_score as s2 WHERE s2.game_id=s1.game_id AND s2.user_game_score_score>s1.user_game_score_score)+1 as rank';
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'admin_game_score_list',
			'sql_select'	=> $sqlSelect,
			'sql_from'		=> 'user_game_score as s1, game as g, user as u',
			'sql_where'		=> $sqlWhere,
			'sql_order'		=> 's1.user_game_score_score DESC',
			'sql_values'	=> $sqlValues,
			'sql_num'		=> 50,
		);
	}
}
?>