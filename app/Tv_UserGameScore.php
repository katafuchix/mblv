<?php
/**
 * Tv_UserGameScore.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームスコアマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserGameScoreManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのゲームスコアステータスを無効にする
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// ユーザーゲームを無効にする
		$o = new Tv_UserGameScore($this->backend);
		$o_list = $o->searchProp(
			array('user_game_score_id'),
			array(
				'user_id' => $user_id,
				'user_game_score_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserGameScore($this->backend, 'user_game_score_id', $v['user_game_score_id']);
				if (!$o->isValid()) return false;
				$o->set('user_game_score_status', 0);
				$o->set('user_game_score_updated_time',$now);
				$o->set('user_game_score_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ユーザゲームスコアオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserGameScore extends Ethna_AppObject
{
}
?>