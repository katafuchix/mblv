<?php
/**
 * Tv_Comment.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * コメントマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_CommentManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのコメントを無効にする
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// ユーザーゲームを無効にする
		$o = new Tv_Comment($this->backend);
		$o_list = $o->searchProp(
			array('comment_id'),
			array(
				'user_id' => $user_id,
				'comment_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($o_list[0] > 0) {
			foreach($o_list[1] as $v) {
				$o = new Tv_Comment($this->backend, 'comment_id', $v['comment_id']);
				if (!$o->isValid()) return false;
				$o->set('comment_status', 0);
				$o->set('comment_updated_time',$now);
				$o->set('comment_deleted_time',$now);
				$o->update();
			} 
		} 
	} 
}

/**
 * コメントオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Comment extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		$this->set('user_id', $user['user_id']);
		$this->set('comment_created_time', $timestamp);
		return parent::add();
	}
}
?>