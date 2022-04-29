<?php
/**
 * Tv_UserSound.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザサウンドマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSoundManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのサウンドを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// ユーザーサウンドを無効にする
		$o = new Tv_UserSound($this->backend);
		$o_list = $o->searchProp(
			array('user_sound_id'),
			array(
				'user_id' => $user_id,
				'user_sound_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserSound($this->backend, 'user_sound_id', $v['user_sound_id']);
				if (!$o->isValid()) return false;
				$o->set('user_sound_status', 0);
				$o->set('user_sound_updated_time',$now);
				$o->set('user_sound_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ユーザサウンドオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserSound extends Ethna_AppObject
{
}
?>