<?php
/**
 * Tv_Comment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ȥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommentManager extends Ethna_AppManager
{
}

/**
 * �����ȥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Comment extends Ethna_AppObject
{
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
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