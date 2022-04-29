<?php
/**
 * Tv_UserDecomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザデコメールマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserDecomailManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのデコメールを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// ユーザーデコメールを無効にする
		$o = new Tv_UserDecomail($this->backend);
		$o_list = $o->searchProp(
			array('user_decomail_id'),
			array(
				'user_id' => $user_id,
				'user_decomail_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_UserDecomail($this->backend, 'user_decomail_id', $v['user_decomail_id']);
				if (!$o->isValid()) return false;
				$o->set('user_decomail_status', 0);
				$o->set('user_decomail_updated_time',$now);
				$o->set('user_decomail_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * ユーザデコメールオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserDecomail extends Ethna_AppObject
{
}
?>