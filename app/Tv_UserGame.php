<?php
/**
 * Tv_UserGame.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザゲームマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserGameManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのゲームを削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// ユーザーゲームを無効にする
		$o = new Tv_UserGame($this->backend);
		$o_list = $o->searchProp(
			array('user_game_id'),
			array(
				'user_id' => $user_id,
				'user_game_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserGame($this->backend, 'user_game_id', $v['user_game_id']);
				if (!$o->isValid()) return false;
				$o->set('user_game_status', 0);
				$o->set('user_game_updated_time',$now);
				$o->set('user_game_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ユーザゲームオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserGame extends Ethna_AppObject
{
}
?>