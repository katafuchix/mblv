<?php
/**
 * Tv_UserAvatar.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザアバターマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserAvatarManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのアバターを削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// ユーザーアバターを無効にする
		$o = new Tv_UserAvatar($this->backend);
		$o_list = $o->searchProp(
			array('user_avatar_id'),
			array(
				'user_id' => $user_id,
				'user_avatar_status' => 1
			)
		); 
		// blog_article_statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v['user_avatar_id']);
				if (!$o->isValid()) return false;
				$o->set('user_avatar_status', 0);
				$o->set('user_avatar_updated_time',$now);
				$o->set('user_avatar_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ユーザアバターオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_UserAvatar extends Ethna_AppObject
{
}
?>