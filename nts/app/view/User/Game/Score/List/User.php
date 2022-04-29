<?php
/**
 * User.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザゲームスコア一覧（ゲーム、ユーザ別）画面ビュー
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_UserGameScoreListUser extends Tv_ListViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$game =& new Tv_Game(
			$this->backend,
			'game_id',
			$this->af->get('game_id')
		);
		$this->af->setApp('game', $game->getNameObject());
		
		$user =& new Tv_User(
			$this->backend,
			'user_id',
			$this->af->get('user_id')
		);
		$this->af->setApp('user', $user->getNameObject());
		
		// リストビュー
		$this->listview = array(
			'action_name'	=> 'user_game_score_list',
			'sql_select'	=> 's1.user_game_score_score, (SELECT count(s2.user_game_score_id) FROM user_game_score as s2 WHERE s2.game_id=s1.game_id AND s2.user_game_score_score>s1.user_game_score_score)+1 as rank',
			'sql_from'		=> 'user_game_score as s1',
			'sql_where'		=> 'game_id=? AND user_id=?',
			'sql_order'		=> 's1.user_game_score_score DESC',
			'sql_values'	=> array(
				$this->af->get('game_id'),
				$this->af->get('user_id'),
			),
			'sql_num'		=> 10,
		);
	}
}

?>
