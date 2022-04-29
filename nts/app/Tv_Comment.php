<?php
/**
 * Tv_Comment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * コメントマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommentManager extends Ethna_AppManager
{
}

/**
 * コメントオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Comment extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access public
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